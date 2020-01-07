<?php

    /**
     * Функция принимает два аргумента: имя файла шаблона и ассоциативный массив с данными для этого шаблона.
     * Функция возвращает строку — итоговый HTML-код с подставленными данными или описание ошибки
     * @param $name string
     * @param $data array
     * @return false|string
     */
    function include_template ($name, $data) {
        $path =  MDB_TEMPLATE_FOLDER;
        $name = $path . $name;
        if (!is_readable($name)) {
            return 'Шаблон с именем ' . $name . ' не существует или недоступен для чтения';
        }
        ob_start();
        extract($data);
        require $name;
        return ob_get_clean();
    }

    /** Функция формирует заполненный фрагмент шаблона на основе массива данных о постах.
     * Название шаблона (его имя совпдадает с таблицей подтипов постов) есть в результате запроса
     * @param $posts
     * @return string
     */
    function get_post_content (
        &$posts,
        $classname,
        $common_feed = true,
        $expanded_id = 0,
        $comments = [],
        $show_all = false
    ) {
        $content = '';
        foreach ($posts as $post) {
            $is_own = isset($post['is_own_post']) ? (intval($post['is_own_post']) === 1) : false;

            $expand = intval($expanded_id) === intval(get_assoc_element($post, 'post_id'));
            $comments_content = $common_feed ? '' : include_template('post_comments.php', [
                'post' => $post,
                'expand' => $expand,
                'comments' => $comments,
                'need_more_comments' => $expand && (intval(COMMENTS_PREVIEW_COUNT) < intval(get_assoc_element($post,
                            'comments_count'))),
                'active_query' => $_SERVER['QUERY_STRING'],
                'active_script' => $_SERVER['PHP_SELF'],
                'shown' => $show_all
            ]);

            $header_postfix = $common_feed ? 'common' : 'profile_' . ($is_own ? 'own' : 'repost');
            $footer_postfix = $common_feed ? 'common' : 'profile';
            $header_content = include_template('post_header_' . $header_postfix . '.php', [
                'post' => $post
            ]);
            $footer_content = include_template('post_footer_' . $footer_postfix . '.php', [
                'post' => $post,
                'post_comments_content' => $comments_content
            ]);

            $template_name = get_assoc_element($post, 'content_type') . '.php';
            $post_content = include_template($template_name, [
                'post' => $post,
                'post_footer_content' => $footer_content,
                'post_header_content' => $header_content,
                'classname' => $classname
            ]);
            $content .= $post_content;
        }
        return $content;
    }

    /**
     * Функция формирует заполненный фрагмент шаблона на основе массива данных.
     * Также в качестве параметров передаются название шаблона и название переменной для элемента данных в этом шаблоне.
     * @param $data
     * @param $template_name
     * @param $variable_name
     * @return string
     */
    function get_various_content (&$data, $template_name, $variable_name) {
        $content = '';
        foreach ($data as $data_row) {
            $row_content = include_template($template_name, [
                $variable_name => $data_row
            ]);
            $content .= $row_content;
        }
        return $content;
    }

    /**
     * Функция возвращает название класса для баннера
     * @param $Массив с данными баннера
     * @return string
     *
     */
    function get_banner_classname (&$banner) {
        $ref = get_pure_data($banner, 'reference');
        if ((empty($ref) || trim($ref) === '#')) {
            $result = '';
        } else {
            $ind = intval(get_pure_data($banner, 'id'));
            $result = 'promo__block--' . (($ind % 2 === 0) ? 'barbershop' : 'technomart');
        }
        return $result;
    }

    /** Функция возвращае название класса в зависимости от того, является ли переключатель активным
     * @param $active
     * @param $current
     * @return string
     */
    function get_switch_classname ($active, $current, $class = 'filters__button') {
        return $active === $current ? $class . '--active' : '';
    }


    /** Функция возвращае название класса в зависимости от того, является ли переключатель активным
     * @param $active
     * @param $current
     * @return string
     */
    function get_mdb_active ($active, $current) {
        return $active === $current ?  ' active' : '';
    }

     /**
     * Возвращает текст комментария для таблицы лайков
     * @param $is_own
     * @return string
     */
    function get_like_text ($is_own) {
        return 'Лайкнул(а) ' . ($is_own ? 'вашу публикацию' : 'публикацию этого блогера');
    }

    /**
     * Функция возвращает сформированный тег href либо пустую строку в зависимости от переданных параметров
     * @param        $content
     * @param        $active_content
     * @param string $filter_type
     * @param string $filter_value
     * @return string
     */
    function get_content_href ($content, $active_content, $filter_type = 'all', $filter_value = null) {
        $href = '';
        if ($content !== $active_content) {
            $href = ' href="' . $content . '.php';
            $href .= empty($filter_value) ? '"' : '?' . $filter_type . '=' . $filter_value . '"';
        }
        return $href;
    }

    /**
     * Функция формирует заполненный шаблон с кнопками фильтров Фото,Видео и т.д.
     * Формирование осуществляется на основе массивов констант, описанных в модуле constants
     * @param        $active_tab
     * @param        $script_name
     * @param        $li_classname
     * @param        $a_classname
     * @param string $classbase
     * @return string
     */
    function get_filters_content (
        $active_tab,
        $script_name,
        $query_string,
        $li_classname,
        $a_classname,
        $vh,
        $is_tab,
        $classbase = 'filters__button--'
    ) {
        $content = '';
        $param = $is_tab ? 'tab' : 'filter';
        for ($i = 1; $i < count(FILTER_NAME); $i++) {
            $value = $is_tab ? $i : trim(get_element(FILTER_ALIAS, $i));
            $is_active = $is_tab ? get_switch_classname($active_tab, $i) : get_switch_classname($active_tab,
                trim(get_element(FILTER_ALIAS, $i)));
            $item_content = include_template('filter_item.php', [
                'filter_text' => get_element(FILTER_NAME, $i),
                'script_name' => $script_name,
                'query_string' => $query_string,
                'param' => $param,
                'value' => $value,
                'filter_svg' => get_element(FILTER_SVG, $i),
                'li_classname' => $li_classname,
                'a_classname' => $a_classname . ' ' . $classbase . TEMPLATE_NAME[$i] . ' ' . $is_active,
                'active_tab' => $active_tab,
                'vh' => $vh,
                'filter_fa_mdb' => get_inline_svg(get_element(FILTER_FA_MDB, $i), 18, 18, "grey", "grey")
            ]);
            $content .= $item_content;
        }
        return $content;
    }

    /**
     * Функция формирует ссылку и подсказку для лайка в зависимости от того, собственный пост или нет
     * @param $post
     * @return string
     */
    function get_like_href_title (&$post) {
        $author_id = get_pure_data($post, 'user_id');
        if (is_auth_user()) {
            $result = intval($author_id) === intval(get_auth_user_property('id')) ? 'title ="Собственный пост нельзя лайкнуть"' :
                'href="like.php?post=' . get_pure_data($post, 'post_id') . '&user=' . get_auth_user_property('id') . '"
             title="Лайк/дизлайк"';
        } else {
            $result = ' title="Необходимо залогиниться ..." ';
        }
        return $result;
    }

    /**
     * Функция формирует ссылку и подсказку для репоста в зависимости от того, собственный пост или нет
     * @param $post
     * @return string
     */
    function get_repost_href_title (&$post) {
        $author_id = get_pure_data($post, 'user_id');
        if (is_auth_user()) {
            $result = intval($author_id) === intval(get_auth_user_property('id')) ? 'title ="Собственный пост нельзя зарепостить"' :
                'href="repost.php?post=' . get_pure_data($post, 'post_id') . '&user=' . get_auth_user_property('id') . '"
             title="Репост"';
        } else {
            $result = ' title="Необходимо залогиниться ..." ';
        }
        return $result;
    }

    /**
     * Функция формирует ссылку и подсказку для подписки в зависимости от того, собственный пост или нет
     * @param $post
     * @return string
     */
    function get_subscription_href_title ($blogger_id, $title = '') {
        $subscriber_id = get_auth_user_property('id');
        if (is_auth_user()) {
            $result = intval($blogger_id) === intval($subscriber_id) ? 'title="Нельзя подписаться на самого себя"' :
                'href="subscription.php?subscriber=' . $subscriber_id . '&blogger=' . $blogger_id . '"
             title="' . $title . '"';
        } else {
            $result = ' title="Необходимо залогиниться ..." ';
        }
        return $result;
    }

    /**
     * Функци возвращает ссылку и подсказку для кнопки отправки сообщения
     * @param $post
     * @return string
     */
    function get_message_href_title (&$data) {
        $user_id = get_pure_data($data, 'user_id');
        return intval($user_id) === intval(get_auth_user_property('id')) ? 'title ="Нельзя отправить сообщение самому себе"' :
            'href="messages.php?user=' . $user_id . ' "  title="Сообщение"';
    }

    /**
     * Функция возвращает атрибуты width и height в зависимости от переданного названия класса
     * @param $classname
     * @return string
     */
    function get_video_size ($classname) {
        return ' width="' . ($classname === 'popular' ? 360 : 760) . '" ' .
            ' height="' . ($classname === 'popular' ? 188 : 396) . '" ';
    }

    /**
     * Возвращает id для iframe
     * @param $post
     * @return string
     */
    function get_video_id ($post) {
        return ' id="' . get_pure_data($post, 'youtube_id') . '" ';
    }

    /**
     * Функция возвращает ссылку и подсказку для кнопки удаления поста
     * @param $post
     * @return string
     */
    function get_delete_post_href_title (&$post) {
        $user_id = get_pure_data($post, 'user_id');
        $post_id = get_pure_data($post, 'post_id');
        return intval($user_id) !== intval(get_auth_user_property('id')) ?
            ' title ="Нельзя удалить чужую публикацию" ' :
            ' href="delete_post.php?post=' . $post_id . '" title="Удалить эту публикацию" ';
    }

    /**
     * Аналог 1С-овской isnull, но для шаблона. Возвращает либо передаваемый параметр, либо передаваемое значение,
     * возвращаемое в случае если параметр - пустое значение
     * @param $parameter
     * @param $default_value
     * @return mixed
     */
    function isnull ($parameter, $default_value) {
        return empty($parameter) ? $default_value : $parameter;
    }

    /**
     * Идея позаимствована из функциии, найденной на просторах интернета. Возвращает favicon для url
     * @param $url
     * @return string
     */
    function get_favicon ($url) {
        $result = EMPTY_FILE;
        if (TRY_GET_FAVICONS) {
            $host = get_pure_data(parse_url($url), 'host');
            $scheme = get_pure_data(parse_url($url), 'scheme');
            $url = str_replace($scheme . '://', '', $host);
            $result = !empty($url) ? 'https://www.google.com/s2/favicons?domain=' . $url : '';
        }
        return $result;
    }

    /**
     * Возвращает псевдопустое изображение для подавления некрасивого текста ALT для отсутствующих аватаров
     * Также уточняет url изображения, если какое-либо из них не было загружено через интерфейс регистрации
     * @param $url
     * @return string
     */
    function get_avatar ($fn) {
        $path = substr($fn, 0, 2) === UI_START ? get_assoc_element(PATHS, AVATARS) : '';
        return !empty($fn) && is_file_exists($path . $fn) ? $path . $fn : EMPTY_AVATAR;
    }

    /**
     * Функция возвращает путь к фото (в зависимости от того, было ли оно загружено через интерфейс программы или нет)
     *    *
     * @param        $post
     * @param string $fieldname
     * @return string
     */
    function get_photo (&$post, $fieldname = 'filename') {
        $fn = get_pure_data($post, $fieldname);
        $path = substr($fn, 0, 2) === UI_START ? get_assoc_element(PATHS, PHOTOS) : '';
        return is_file_exists($path . $fn) ? $path . $fn  : EMPTY_FILE;
    }

    /**
     * Функция устанавливает атрибуты для использования в JS
     * @param        $post
     * @param string $suffix
     * @return string
     */
    function set_post_id (&$post, $suffix = '') {
        return ' ' . POST_IDENTIFICATOR . $suffix . '="' . get_pure_data($post, 'post_id') . '" ';
    }

    /**
     * Функция устанавливает атрибуты для использования в JS
     * @param        $blogger
     * @param string $suffix
     * @param string $field_name
     * @return string
     */
    function set_blogger_id (&$blogger, $suffix = '', $field_name = 'user_id') {
        return ' ' . BLOGGER_IDENTIFICATOR . $suffix . '="' . get_pure_data($blogger, $field_name) . '" ';
    }

    /**
     * Функция возвращает тег для превью в зависимости от типа публикации
     * @param $post
     * @return string
     */
    function get_post_preview_tag (&$post) {
        $category_id = intval(get_assoc_element($post, 'category_id'));
        switch ($category_id) {
            case 1:
                {
                    $tag = '<img class="post-mini__image" src="' . get_photo($post, 'photo') .
                        '" width="109" height="109" alt="Превью публикации">';
                    break;
                }
            case 2:
                {
                    $tag = '<iframe class="post-video__preview"
                                id="rzJhacp9z9I" width="109" height="109" src="http://www.youtube.com/embed/rzJhacp9z9I?autoplay=0">
                            </iframe>';
                    break;
                }
            default:
                {
                    $tag = FILTER_SVG[$category_id] ?? '';
                }

        }
        return $tag;
    }

    /**
     * Функция возвращает инлайновое svg. В параметрах можно задать размеры и цвет.
     * @param        $svg
     * @param int    $width
     * @param int    $height
     * @param string $fill
     * @param string $stroke
     * @return string
     */
    function get_inline_svg ($svg , $width = 30, $height = 30, $fill = "white", $stroke= "white") {
        return '<svg  stroke="' . $stroke . '" fill="' . $fill . '" width="' . $width .'" height="' . $height . '">
                   <use xlink:href="#' . $svg . '"></use>
                </svg>';
    }

    /**
     * Функция возвращает svg для типа публикации
     * @param $like
     * @return string
     */
    function get_pseudo_preview ($like) {
        $result = '';
        $index = intval(get_pure_data($like, 'category_id'));
        if ($index >= 0 && $index < count(FILTER_FA_MDB)) {
            $result = get_inline_svg(FILTER_FA_MDB[$index], 25, 25, "#3f51b5", "#3f51b5");
        }
        return $result;
    }
