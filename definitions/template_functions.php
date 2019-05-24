<?php

    /**
     * Функция принимает два аргумента: имя файла шаблона и ассоциативный массив с данными для этого шаблона.
     * Функция возвращает строку — итоговый HTML-код с подставленными данными или описание ошибки
     * @param $name string
     * @param $data array
     * @return false|string
     */
    function include_template ($name, $data) {
        $name = TEMPLATE_FOLDER . $name;
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
    function get_post_content (&$posts, $classname, $common_feed = true) {
        $content = '';
        foreach ($posts as $post) {
            $is_own = isset($post['is_own_post']) ? (intval($post['is_own_post']) === 1) : false;
            $expand = false;

            $comments_content = $common_feed ? '' : include_template('post_comments.php', [
                'post' => $post,
                'expand' => $expand,
                'comments' => []
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
                'vh' => $vh
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
        return intval($author_id) === intval(get_auth_user_property('id')) ? 'title ="Собственный пост нельзя лайкнуть"' :
            'href="like.php?post=' . get_pure_data($post, 'post_id') . '&user=' . get_auth_user_property('id') . '" 
             title="Лайк/дизлайк"';
    }

    /**
     * Функция формирует ссылку и подсказку для репоста в зависимости от того, собственный пост или нет
     * @param $post
     * @return string
     */
    function get_repost_href_title (&$post) {
        $author_id = get_pure_data($post, 'user_id');
        return intval($author_id) === intval(get_auth_user_property('id')) ? 'title ="Собственный пост нельзя зарепостить"' :
            'href="repost.php?post=' . get_pure_data($post, 'post_id') . '&user=' . get_auth_user_property('id') . '" 
             title="Репост"';
    }

    /**
     * Функция формирует ссылку и подсказку для подписки в зависимости от того, собственный пост или нет
     * @param $post
     * @return string
     */
    function get_subscription_href_title ($blogger_id, $title = '') {
        $subscriber_id = get_auth_user_property('id');
        return intval($blogger_id) === intval($subscriber_id) ? 'title="Нельзя подписаться на самого себя"' :
            'href="subscription.php?subscriber=' . $subscriber_id . '&blogger=' . $blogger_id . '" 
             title="' . $title . '"';
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