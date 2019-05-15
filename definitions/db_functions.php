<?php
    /**
     * Функция принимает ассоциативный массив с параметрами подключения к БД (host, user, password, database)
     * Возвращает соединение или false
     * @param $config
     * @return mysqli
     */
    function get_connection ($config) {
        $connection = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
        if ($connection) {
            mysqli_set_charset($connection, "utf8");
        }
        return $connection;
    }

    /**
     * Функция принимает соединение, текст запроса и пользовательское сообщение для вывода в случае ошибки.
     * Возвращает либо данные, полученные из БД в виде массива, либо ассоциативный массив с описанием ошибки
     * @param        $connection
     * @param        $query
     * @param string $user_error_message
     * @param bool   $single
     * @return array|null
     */
    function get_data_from_db (&$connection, $query, $user_error_message, $single = false) {
        $data = [[ERROR_KEY => $user_error_message]];
        if ($connection) {
            $result = mysqli_query($connection, $query);
            if ($result) {
                $data = $single ? mysqli_fetch_assoc($result) : mysqli_fetch_all($result, MYSQLI_ASSOC);
            } else {
                $data = [[ERROR_KEY => mysqli_error($connection)]];
            }
        }
        return $data;
    }

    /**
     * Функция устанавливает, имел ли место факт ошибки при получении данных, анализируя переданный по ссылке массив,
     * полученный функцией get_data_from_db
     * @param $data
     * @return bool
     */
    function was_error (&$data) {
        return isset($data[0]) && array_key_exists(ERROR_KEY, $data[0]);
    }

    /**
     * Функция для совместного использования с функцией was_error. Возвращает описание ошибки.
     * @param array $data
     * @return string
     */
    function get_error_description (&$data) {
        return isset($data[0]) ? get_assoc_element($data[0], ERROR_KEY) : 'Неизвестная ошибка...';
    }

    /**
     * Вспомогательная функция. Возвращает основную часть текста запроса для выборки постов
     * К subscriber_id операция mysqli_real_escape_string должна быть применена в вызывающей функции!
     * Семену - привет!
     * @return string
     */
    function get_posts_query_skeleton ($subscriber_id = null) {
        $subscriber_join = empty($subscriber_id) ? '' :
            ' JOIN (SELECT subscriber_id, blogger_id FROM subscriptions WHERE subscriber_id = ' . $subscriber_id .') AS s
            ON p.user_id = blogger_id ';
        return 'SELECT  p.user_id, p.category_id, p.title, p.id AS post_id, p.hashtag, u.name AS username, u.avatar, c.content_type,
                    IFNULL(ph.filename, IFNULL(v.filename, "") ) AS filename,
                    IFNULL(q.author, "") AS author,
                    IFNULL(l.reference, "") AS ref,
                    CASE WHEN t.text IS NOT NULL THEN t.text
                     WHEN q.text IS NOT NULL THEN q.text
                     WHEN l.description IS NOT NULL THEN l.description
                    ELSE  "" END AS text,
                    IFNULL(lk.likes_count, 0) AS likes_count, IFNULL(lk.comments_count, 0) AS comments_count, IFNULL(lk.reposts_count, 0) AS reposts_count
                    FROM posts AS p '. $subscriber_join . '
                    JOIN users u ON p.user_id = u.id
                    JOIN categories c ON p.category_id = c.id
                                        LEFT OUTER JOIN photos AS ph ON p.id = ph.post_id AND c.content_type="' . FILTER_PHOTOS . '"
                                        LEFT OUTER JOIN videos AS v ON p.id = v.post_id AND c.content_type="' . FILTER_VIDEOS . '"
                                        LEFT OUTER JOIN quotes AS q ON p.id = q.post_id AND c.content_type="' . FILTER_QUOTES . '"
                                        LEFT OUTER JOIN links AS l ON p.id = l.post_id AND c.content_type="' . FILTER_LINKS . '"
                                        LEFT OUTER JOIN texts AS t ON p.id = t.post_id AND c.content_type="' . FILTER_TEXTS . '"
                    LEFT OUTER JOIN  (
                    SELECT post_id, sum(likes_count) AS likes_count, sum(comments_count) AS comments_count, sum(reposts_count) AS reposts_count
                    FROM (SELECT post_id, COUNT(*) AS likes_count, 0 AS comments_count, 0 AS reposts_count
                          FROM likes AS l
                          GROUP BY post_id
                          UNION
                          SELECT post_id, 0, COUNT(*) AS comments_count, 0
                          FROM comments AS l
                          GROUP BY post_id
                          UNION
                          SELECT post_id, 0, 0, COUNT(*) AS reposts_count
                          FROM reposts AS r
                          GROUP BY post_id
                          ) AS tmp                           
                    GROUP BY post_id) AS lk ON p.id=lk.post_id ';
    }

    /**
     * Функция возвращает данные о постах или пустой массив
     * @param $connection
     * @return array|null
     */
    function get_posts ($connection, $type, $limit = RECORDS_PER_PAGE, $offset = 0, $sort = null, $search_string = null) {
        $search_string =  mysqli_real_escape_string($connection, $search_string);
        $search_condition = empty($search_string) ? '' : ' MATCH(title, hashtag) AGAINST("*' . $search_string . '*" IN BOOLEAN MODE) ';
        $sort_condition = empty($sort) ? '' : ' ORDER BY ' . $sort . ' DESC ';
        $type_condition = empty($type) || ($type === FILTER_ALL) ? '' :
            ' content_type = "' . mysqli_real_escape_string($connection, $type) . '" ';
        $where_condition = empty($type_condition) ?   '' : ' WHERE ' . $type_condition;
        if (!empty($search_condition)) {
            $where_condition .=   ( empty($where_condition) ? ' WHERE ' : ' AND ') . $search_condition;
        }
        $sql = get_posts_query_skeleton() . $where_condition . ' ' . $sort_condition .
        ' LIMIT ' . $limit . ' OFFSET ' . $offset . ';';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные о постах');
        return (!$data || was_error($data)) ? [] : $data;
    }

    /**
     * Функция возвращает данные о постах или пустой массив
     * @param $connection
     * @return array|null
     */
    function get_posts_for_feed ($connection, $user_id, $type, $limit = RECORDS_PER_PAGE, $offset = 0) {
        $user_id  =  mysqli_real_escape_string($connection, $user_id);
        $sort_condition = empty($sort) ? '' : ' ORDER BY ' . $sort . ' DESC ';
        $type_condition = empty($type) || ($type === FILTER_ALL) ? '' :
            ' WHERE content_type = "' . mysqli_real_escape_string($connection, $type) . '" ';
        $sql = get_posts_query_skeleton($user_id) . $type_condition . ' ' . $sort_condition .
            ' LIMIT ' . $limit . ' OFFSET ' . $offset . ';';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные о постах');
        return (!$data || was_error($data)) ? [] : $data;
    }

    /**
     * Функция возвращает результат запроса для постов, имеющих отношение к пользователю: репосты и собственные посты
     * @param $connection
     * @param $user_id
     * @return array|null
     */
    function get_posts_for_profile ($connection, $user_id, $limit = RECORDS_PER_PAGE, $offset = 0) {
        $user_id = mysqli_real_escape_string($connection, $user_id);
        $sql = 'SELECT pfp.update_date, pfp.is_own_post, sp.* FROM
                        (SELECT id AS post_id, user_id AS author_id, creation_date AS update_date, 1 AS is_own_post
                        FROM posts
                        WHERE user_id =' . $user_id . ' 
                        UNION
                        SELECT tmp.post_id, tmp.author_id, repost_date, 0 AS is_own_post
                        FROM (SELECT r.post_id AS post_id, IFNULL(p.user_id, 0) AS author_id, r.creation_date AS repost_date
                              FROM reposts AS r
                                     JOIN posts p ON r.post_id = p.id
                              WHERE r.user_id = ' . $user_id . ') AS tmp) AS  pfp
                        JOIN (' . get_posts_query_skeleton() . ') AS sp
                        ON pfp.post_id=sp.post_id ORDER BY pfp.update_date DESC 
                        LIMIT ' . $limit . ' OFFSET ' . $offset . ';';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные о постах');

        return (!$data || was_error($data)) ? [] : $data;
    }

    /** Функция возвращает даные о баннерах или пустой массив
     * @param $connection
     * @return array|null
     */
    function get_banners ($connection) {
        $sql = 'SELECT id, text, reference, description FROM banners ORDER BY creation_date DESC;';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные о баннерах');
        return (!$data || was_error($data)) ? [] : $data;
    }
    /**
     * Функция проверяет существование ключа в указанной таблице БД
     * @param $connection
     * @param $table
     * @param $id
     * @return array|null
     */
    function get_id_existance ($connection, $table, $id) {
        $data = [[ERROR_KEY => 'Id =  ' . $id . ' в таблице ' . $table . ' не существует! ']];
        $sql = 'SELECT id FROM ' . $table . ' WHERE id = ' . mysqli_real_escape_string($connection, $id) . ' LIMIT 1;';
        $result = get_data_from_db($connection, $sql, 'Невозможно получить id из таблицы ' . $table, true);
        if ($result) {
            $data = $result;
        }
        return $data;
    }

    /**
     * Функция возвращает id записи, если поле с переданным значением существует в таблице БД
     * @param $connection
     * @param $table
     * @param $field_name
     * @param $field_value
     * @return bool
     */
    function get_id_by_value ($connection, $table, $field_name, $field_value) {
        $sql = 'SELECT id  FROM ' . $table . ' WHERE ' .
            mysqli_real_escape_string($connection, $field_name) . ' = "' .
            mysqli_real_escape_string($connection, $field_value) . '" LIMIT 1;';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные с такими условиями из таблицы ' . $table, true);
        return (!$data || was_error($data)) ? 0 : intval(get_assoc_element($data, 'id'));
    }

    /**
     * Функция возращает ошибку, если невозможно получить данные из БД, массив с id пользователя, если пользователь
     * с таким email существует, null - если не было ошибки и такого пользователя нет в БД
     * @param $connection
     * @param $email
     * @return null || array
     */
    function get_id_by_email ($connection, $email) {
        $sql = 'SELECT id FROM users WHERE email = "' . mysqli_real_escape_string($connection, $email) . '" LIMIT 1;';
        return get_data_from_db($connection, $sql, 'Невозможно получить id пользователя', true);
    }

    /**
     * Функция возвращает true в случае успешного добавления пользователя, false - в случае ошибки
     * Если пользователь с таким email уже сушествовал - возвращается массив c id.
     * @param $connection
     * @param $user
     * @return bool || array
     */
    function add_user ($connection, $user) {

        $user_status = get_id_by_email($connection, get_assoc_element($user, 'email'));

        if ($user_status) {
            return $user_status;
        }

        $sql = 'INSERT INTO users ( email, name, user_password) 
                          VALUES ( ?, ?, ?)';

        $stmt = db_get_prepare_stmt($connection, $sql, [
            get_assoc_element($user, 'email'),
            get_assoc_element($user, 'name'),
            password_hash(get_assoc_element($user, 'password'), PASSWORD_DEFAULT)
        ]);

        $res = mysqli_stmt_execute($stmt);

        return ($res) ? true : false;
    }

    /**
     * Функция возвращает результат запроса в виде ассоциативного массива со статусом и данными
     * @param $connection
     * @param $email
     * @return array|null
     */
    function get_user_by_email ($connection, $email) {
        $sql = 'SELECT id, email, user_password, name, avatar FROM users WHERE email="' . mysqli_real_escape_string($connection,
                $email) . '" LIMIT 1;';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные пользователя', true);
        if (!$data) {
            $result = ['status' => get_assoc_element(GET_DATA_STATUS, 'no_data'), 'data' => null];
        } else {
            if (was_error($data)) {
                $result = ['status' => get_assoc_element(GET_DATA_STATUS, 'db_error'), 'data' => null];
            } else {
                $result = ['status' => get_assoc_element(GET_DATA_STATUS, 'data_received'), 'data' => $data];
            }
        }
        return $result;
    }

    /**
     * Функция возвращает данные о пользователе для профиля или пустой массив
     * @param $connection
     * @param $user_id
     * @return array|null
     */
    function get_user_info ($connection, $user_id) {
        $user_id = mysqli_real_escape_string($connection, $user_id);
        $sql = 'SELECT u.id as user_id, u.avatar,
                       u.name as username,
                       u.registration_date,
                       IFNULL(p.posts_count, 0)      AS posts_count,
                       IFNULL(s.subscribers_count, 0) AS subscribers_count
                FROM users AS u
                        LEFT OUTER JOIN (SELECT count(*) AS posts_count, user_id
                                            FROM posts
                                            WHERE user_id = ' . $user_id . '
                                            GROUP BY user_id) AS p ON u.id = p.user_id
                        LEFT OUTER JOIN (SELECT count(*) AS subscribers_count, blogger_id
                                            FROM subscriptions
                                            WHERE blogger_id = ' . $user_id . '
                                            GROUP BY blogger_id) AS s ON u.id = s.blogger_id
                WHERE u.id = ' . $user_id . ';';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные о пользователе', true);
        return (!$data || was_error($data)) ? [] : $data;
    }

    /**
     * Функция возвращает данные о лайках, полученных постами пользователя или пустой массив
     * @param $connection
     * @param $author_id
     * @return array|null
     */
    function get_authors_likes ($connection, $author_id) {
        $author_id = mysqli_real_escape_string($connection, $author_id);
        $sql = 'SELECT l.post_id,
                     l.user_id AS fan_id,
                     u.name    AS fan_name,
                     u.avatar AS fan_avatar,
                     l.creation_date,
                     p.user_id AS author_id,
                     uu.name   AS author_name,       
                     "" as filename 
                FROM likes AS l
                     JOIN posts AS p ON l.post_id = p.id
                     JOIN users AS uu ON p.user_id = uu.id
                     JOIN users AS u ON l.user_id = u.id
                WHERE p.user_id = ' . $author_id . ';';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные о лайках');
        return (!$data || was_error($data)) ? [] : $data;
    }

    /**
     * Функция возвращает информацию о подписках выбранного пользователя
     * @param $connection
     * @param $user_id
     * @return array|null
     */
    function get_user_subscriptions ($connection, $user_id) {
        $user_id = mysqli_real_escape_string($connection, $user_id);
        $sql = 'SELECT t.blogger_id, t.posts_count, t.subscribers_count, u.name AS blogger_name, u.avatar, u.registration_date
                    FROM (SELECT tmp.blogger_id, sum(tmp.posts_count) AS posts_count, sum(tmp.subscribers_count) AS subscribers_count
                          FROM (SELECT p.user_id AS blogger_id, COUNT(*) AS posts_count, 0 AS subscribers_count
                                FROM posts AS p
                                            JOIN (SELECT blogger_id FROM subscriptions WHERE subscriber_id = ' . $user_id . ') AS nocte
                                                 ON p.user_id = nocte.blogger_id
                                GROUP BY p.user_id
                                UNION
                                SELECT s.blogger_id, 0 AS posts_count, COUNT(*) AS subscribers_count
                                FROM subscriptions AS s
                                            JOIN (SELECT blogger_id FROM subscriptions WHERE subscriber_id = ' . $user_id . ') AS nocte
                                                 ON s.blogger_id = nocte.blogger_id
                                GROUP BY s.blogger_id) AS tmp
                          GROUP BY tmp.blogger_id) AS t
                                JOIN users AS u ON t.blogger_id = u.id';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные о подписках');
        return (!$data || was_error($data)) ? [] : $data;
    }

    /**
     * Функция возвращает детальную информацию о посте по его id
     * @param $connection
     * @param $post_id
     * @return array|null
     */
    function get_post_details ($connection, $post_id) {
        $post_id = mysqli_real_escape_string($connection, $post_id);
        $post_condition =  ' WHERE p.id=' . $post_id . ' ';
        $sql = get_posts_query_skeleton() . $post_condition . ';';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные о поcте', true);
        return (!$data || was_error($data)) ? [] : $data;
    }

    /**
     * Функция возвращает массив сообщений, которыми обменивались 2 пользователя.
     * Если не передан $correspondent_id - то будут возвращены все сообщения пользователя
     * @param $connection
     * @param $post_id
     * @return array|null
     */
    function get_messages ($connection, $user_id, $corresponent_id = null) {
        $user_id = mysqli_real_escape_string($connection, $user_id);
        $corresponent_id = !empty($corresponent_id) ? mysqli_real_escape_string($connection,
            $corresponent_id) : $corresponent_id;
        $users_condition = ' WHERE m.from_id = ' . $user_id . (empty($corresponent_id) ? '' : ' AND m.to_id = ' . $corresponent_id) . '  
                             OR m.to_id = ' . $user_id . (empty($corresponent_id) ? '' :' AND m.from_id =' . $corresponent_id) . ' ';
        $sql = 'SELECT m.from_id AS author_id,
                       IF(m.from_id = '. $user_id . ', 1 , 0)   AS is_own,
                       m.text,
                       m.creation_date,
                       u.name AS author_name,
                       u.avatar AS author_avatar
                       FROM messages AS m
                JOIN  users AS u ON m.from_id = u.id
                       ' . $users_condition . ' ORDER BY m.id DESC LIMIT  ' . RECORDS_PER_PAGE . ' OFFSET 0;';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные о поcте');
        return (!$data || was_error($data)) ? [] : $data;
    }

    /**
     * @param $connection
     * @param $user_id
     * @return array|null
     */
    function get_messages_totals ($connection, $user_id) {
        $user_id = mysqli_real_escape_string($connection, $user_id);
        $sql = 'SELECT m.unread_count,
                       m.total_count,
                       m.correspondent_id,
                       m.last_id,
                       mm.creation_date,
                       CONCAT(substr(mm.text, 1, ' . SHORT_TEXT_LENGTH . '), "...") AS message_part,
                       u.id AS correspondent_id,
                       u.name AS correspondent_name,
                       u.avatar AS correspondent_avatar
                 FROM (SELECT SUM(IF(from_id = ' . $user_id . ' AND was_read = 0, 1, 0)) AS unread_count,
                              SUM(1) AS total_count,
                              MAX(id) AS last_id,
                              IF(from_id = ' . $user_id . ', to_id, from_id) AS correspondent_id
                       FROM messages AS m
                       WHERE from_id = ' . $user_id . ' OR to_id = ' . $user_id . '
                       GROUP BY correspondent_id
                       HAVING max(id)) AS m
                        JOIN users AS u ON m.correspondent_id = u.id
                        JOIN messages AS mm ON m.last_id = mm.id;';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные о сообщениях пользователя');
        return (!$data || was_error($data)) ? [] : $data;
    }

    /**
     * Основная часть транзакции по добавлению поста: проверка значений и вызов функции для добавления дочерних сущностей
     * @param $connection
     * @param $post
     * @param $title
     * @param $tab
     * @param $user_id
     * @return array|int|string
     */
    function add_post($connection, $post, $title, $tab, $user_id) {
        $user_id =  mysqli_real_escape_string($connection, $user_id);
        $tab =  mysqli_real_escape_string($connection, $tab);

        $user_status = get_id_existance($connection, 'users', $user_id);
        $category_id = get_id_by_value($connection, 'categories', 'content_type', $tab);

        if (empty($category_id) ||  was_error($user_status)) {
            return ['error' => 'Попытка использовать несуществующие данные для добавления поста. Пост не будет добавлен!'];
        }

        mysqli_query($connection, "START TRANSACTION");

        $sql = 'INSERT INTO posts (category_id, user_id,  title)
                          VALUES ( ?, ?, ?)';
        $stmt = db_get_prepare_stmt($connection, $sql, [
            $category_id,
            $user_id,
            $title
        ]);
        $res = mysqli_stmt_execute($stmt);
        $new_id = $res ? mysqli_insert_id($connection) : 0 ;

        $res_child = add_child_entity($connection, $new_id, $post, $tab);

        if ($res && $res_child) {
            mysqli_query($connection, "COMMIT");
        }
        else {
            mysqli_query($connection, "ROLLBACK");
        }

        return $new_id ?? 0;
    }

    /** Вторая часть транзакции по добавлению поста: добавление дочерних сущностей по типам контента
     * @param $connection
     * @param $post_id
     * @param $post
     * @param $tab
     * @return bool
     */
    function add_child_entity ($connection, $post_id, $post, $tab) {
        switch ($tab) {
            case FILTER_PHOTOS:
                $sql = 'INSERT INTO ' . $tab . ' (post_id, filename)
                          VALUES ( ?, ?)';
                $params = [$post_id, get_assoc_element($post, 'userpic-file-photo')];
                break;
            case FILTER_VIDEOS:
                $sql = 'INSERT INTO ' . $tab . ' (post_id, filename)
                          VALUES ( ?, ?)';
                $params = [$post_id, get_assoc_element($post, 'userpic-file-video')];
                break;
            case FILTER_QUOTES:
                $sql = 'INSERT INTO ' . $tab . ' (post_id, text, author)
                          VALUES ( ?, ?, ?)';
                $params = [$post_id, get_assoc_element($post, 'quote-text'), get_assoc_element($post, 'quote-author')];
                break;
            case FILTER_TEXTS:
                $sql = 'INSERT INTO ' . $tab . ' (post_id, text)
                          VALUES ( ?, ?)';
                $params = [$post_id, get_assoc_element($post, 'post-text')];
                break;
            case FILTER_LINKS:
                $sql = 'INSERT INTO ' . $tab . ' (post_id, reference,  description)
                          VALUES ( ?, ?, ?)';
                $params = [$post_id, get_assoc_element($post, 'post-link'), get_assoc_element($post, 'post-text')];
                break;
            default:
        }
        $stmt = db_get_prepare_stmt($connection, $sql, $params);
        return mysqli_stmt_execute($stmt);
    }

    /**
     * Функция возвращает результаты расчета общего количества страниц для пагинации по постам.
     * Передается соединение, число записей на страницу и в качестве необязательного параметра id категории
     * @param      $connection
     * @param      $limit
     * @param null $category_id
     * @return array|int|null
     */
    function get_posts_total_pages ($connection, $limit, $category_id = null) {
        $category_condition = $category_id ?
            ' WHERE category_id = ' . mysqli_real_escape_string($connection, $category_id) . ' GROUP BY category_id;' :
            ';';
        $sql = 'SELECT CEIL(COUNT(*) / ' . $limit . ') AS page_count, COUNT(*) AS total_records FROM posts ' . $category_condition;
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные для пагинации', true);
        return (!$data || was_error($data)) ? 1 : intval(get_assoc_element($data, 'page_count'));
    }

    /**
     * Функция возвращает либо первые комментарии к посту, либо все
     * @param      $connection
     * @param      $post_id
     * @param null $limit
     * @return array|null
     */
    function get_post_comments ($connection, $post_id, $limit = null) {
        $post_id = mysqli_real_escape_string($connection, $post_id);
        $limit_condition = empty($limit) ? '' : ' LIMIT ' . $limit;
        $sql = 'SELECT c.user_id, c.text, c.creation_date, u.name as username, u.avatar as avatar
                    FROM comments AS c
                      JOIN users AS u ON c.user_id=u.id WHERE c.post_id=' . $post_id  .  $limit_condition . ';';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные о комментариях');
        return (!$data || was_error($data)) ? [] : $data;
    }

    /**
     * Функция возвращает истину в случае успешного добавления комменатрия или ложь - в случае ошибки
     * @param $connection
     * @param $text
     * @param $user_id
     * @param $post_id
     * @return bool
     */
    function add_comment ($connection, $text, $user_id, $post_id) {

        $user_status = get_id_existance($connection, 'users', $user_id);
        if (was_error($user_status) || empty($text)) {
            return false;
        }

        $sql = 'INSERT INTO comments ( user_id,  post_id, text) 
                          VALUES (?, ?, ?)';
        $stmt = db_get_prepare_stmt($connection, $sql, [
            $user_id,
            $post_id,
            $text
        ]);
        $res = mysqli_stmt_execute($stmt);

        return ($res) ? true : false;
    }

    /**
     * Функция переключает состояние лайка залогиненного пользователя для поста. Возвращает true в случае успеха,
     * false - в случае ошибки
     * @param $connection
     * @param $user_id
     * @param $post_id
     * @return bool
     */
    function switch_like ($connection, $user_id, $post_id) {
        return switch_common($connection, $user_id, $post_id, 'likes');
    }

    /**
     * Функция переключает состояние репоста залогиненного пользователя для поста. Возвращает true в случае успеха,
     * false - в случае ошибки
     * @param $connection
     * @param $user_id
     * @param $post_id
     * @return bool
     */
    function switch_repost ($connection, $user_id, $post_id) {
        return switch_common($connection, $user_id, $post_id, 'reposts');
    }

    /**
     * Функция переключает состояние данных по публикации в указанной таблице для залогиненного пользователя.
     * Возвращает true в случае успеха, false - в случае ошибки
     * @param $connection
     * @param $user_id
     * @param $post_id
     * @return bool
     */
    function switch_common ($connection, $user_id, $post_id, $table) {
        $user_id = mysqli_real_escape_string($connection, $user_id);
        $post_id = mysqli_real_escape_string($connection, $post_id);
        $sql = 'SELECT id  FROM ' . $table . ' WHERE user_id=' . $user_id . ' AND post_id=' . $post_id . ';';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные', true);

        if (was_error($data)) {
            return false;
        }

        if (empty($data)) {
            //mytodo Подумать: может, стОит добавить и здесь проверку, не является ли пост собственным.
            // Но вообще это делается при формировании ссылки
            $sql = 'INSERT INTO ' . $table . ' ( user_id,  post_id) 
                          VALUES (?, ?)';
            $stmt = db_get_prepare_stmt($connection, $sql, [
                $user_id,
                $post_id
            ]);
            $res = mysqli_stmt_execute($stmt);
        } else {
            $sql = 'DELETE FROM ' . $table . '  WHERE  user_id=' . $user_id . ' AND post_id=' . $post_id . ';';
            $res = mysqli_query($connection, $sql);
        }
        return ($res) ? true : false;
    }

    /**
     * Функция переключает состояние репоста залогиненного пользователя для поста. Возвращает true в случае успеха,
     * false - в случае ошибки
     * @param $connection
     * @param $subscriber_id
     * @param $post_id
     * @return bool
     */
    function switch_subscription ($connection, $subscriber_id, $blogger_id) {
        $subscriber_id = mysqli_real_escape_string($connection, $subscriber_id);
        $blogger_id = mysqli_real_escape_string($connection, $blogger_id);

        $sql = 'SELECT id  FROM subscriptions WHERE subscriber_id=' . $subscriber_id . ' AND blogger_id=' . $blogger_id . ';';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные о подписках', true);

        if (was_error($data)) {
            return false;
        }

        if (empty($data)) {
            //mytodo Подумать: может, стОит добавить и здесь проверку, не является ли подписчик автором.
            // Но вообще это делается при формировании ссылки
            $sql = 'INSERT INTO subscriptions ( subscriber_id, blogger_id) 
                          VALUES (?, ?)';
            $stmt = db_get_prepare_stmt($connection, $sql, [
                $subscriber_id,
                $blogger_id
            ]);
            $res = mysqli_stmt_execute($stmt);
        } else {
            $sql = 'DELETE FROM subscriptions WHERE subscriber_id=' . $subscriber_id . ' AND blogger_id=' . $blogger_id . ';';
            $res = mysqli_query($connection, $sql);
        }
        return ($res) ? true : false;
    }

    /**
     * Функция возвращает данные об авторах постов или пустой массив
     * @param $connection
     * @return array|null
     */
    function get_posts_authors ($connection,  $limit = RECORDS_PER_PAGE, $offset = 0, $search_string = null) {
        $search_condition = !empty($search_string) ?
            ' WHERE MATCH(p.title, p.hashtag) AGAINST("*' .  mysqli_real_escape_string($connection, $search_string) . '*" IN BOOLEAN MODE) ' : '';
        $sql = 'SELECT p.user_id  AS blogger_id,
                       u.name AS blogger_name,
                       u.avatar,
                       u.registration_date,
                       IFNULL(s.subscribers_count, 0) AS subscribers_count,
                       IFNULL(pp.posts_count, 0) AS posts_count
                FROM posts AS p
                       JOIN users AS u ON p.user_id = u.id
                       LEFT OUTER JOIN (SELECT blogger_id, count(*) AS subscribers_count FROM subscriptions GROUP BY blogger_id) AS s
                                       ON p.user_id = s.blogger_id
                       LEFT OUTER JOIN (SELECT user_id, count(*) AS posts_count FROM posts GROUP BY user_id) AS pp
                                       ON p.user_id = pp.user_id                
                ' . $search_condition . '
                GROUP BY p.user_id LIMIT ' . $limit . ' OFFSET ' . $offset . ';';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные о постах');
        return (!$data || was_error($data)) ? [] : $data;
    }

    /**
     * Функция возвращает количество страниц для пагинации по авторам постов
     * @param      $connection
     * @param      $limit
     * @param null $search_string
     * @return int
     *
     */
    function get_posts_authors_total_pages ($connection, $limit, $search_string = null) {
        $search_condition = !empty($search_string) ?
            ' WHERE MATCH(p.title, p.hashtag) AGAINST("*' .  mysqli_real_escape_string($connection, $search_string) . '*" IN BOOLEAN MODE) ' : '';
        $sql = 'SELECT CEIL(COUNT(*) / ' . $limit . ') AS page_count, COUNT(*) AS total_records FROM posts ' . $search_condition . ' GROUP BY user_id;';
        $data = get_data_from_db($connection, $sql, 'Невозможно получить данные для пагинации', true);
        return (!$data || was_error($data)) ? 1 : intval(get_assoc_element($data, 'page_count'));
    }
