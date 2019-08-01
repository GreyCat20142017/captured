<?php

    session_start();
    require_once('init.php');

    if (!is_auth_user()) {
        http_response_code(302);
        header('Location: login.php');
    }

    $errors = [];
    $user = [];
    $db_user = [];
    $is_ok = true;
    $logged_user_id = intval(get_auth_user_property('id'));
    $search_string = get_auth_user_property('last_search', $search_string ?? '') ?? '';

    if (isset($_GET['user'])) {
        $user_id = isset($_GET['user']) ? intval(strip_tags($_GET['user'])) : 0;
    } else {
        $user_id = $logged_user_id;
    }

    if (isset($_GET['expand'])) {
        $show_all = !empty($_GET['all_comments']);
        $expanded_id = intval(strip_tags($_GET['expand']));
        $expanded_comments = get_post_comments($connection, $expanded_id, $show_all ? null : COMMENTS_PREVIEW_COUNT);
    } else {
        $expanded_id = 0;
        $expanded_comments = [];
    }

    $is_own_profile = ($user_id === $logged_user_id);
    $db_user = empty($user_id) ? [] : get_user_info($connection, $user_id);

    $is_ok = !empty($db_user);

    if (empty($db_user) && $is_own_profile) {
        /**
         * Если пользователя в БД не существует и сеанс тоже под юзером с таким id - разлогинить его срочно!
         */
        logout_current_user();
        header('Location: login.php');
    }

    $active_param = isset($_GET['tab']) ? intval(strip_tags($_GET['tab'])) : 1;
    $active_param = (($active_param <= 0) || ($active_param > count(TABS))) ? 1 : $active_param;
    $active_tab = TABS[$active_param - 1];

    $page = isset($_GET['page']) ? intval(strip_tags($_GET['page'])) : 1;
    $page_count = 1;

    switch ($active_tab) {
        case POSTS:
            {
                $page_count = get_profile_posts_total_pages ($connection, $user_id, RECORDS_PER_PAGE);
                $posts = get_posts_for_profile($connection, $user_id, RECORDS_PER_PAGE, ($page - 1) * RECORDS_PER_PAGE);
                $content = include_template('profile_posts.php', [
                    'inner_part' => get_post_content($posts, 'profile', false, $expanded_id, $expanded_comments, $show_all ?? false)
                ]);
                break;
            }
        case LIKES:
            {
                $page_count =  get_profile_likes_total_pages ($connection, $user_id, RECORDS_PER_PAGE);
                $likes = get_authors_likes($connection, $user_id, RECORDS_PER_PAGE, ($page - 1) * RECORDS_PER_PAGE);
                $content = include_template('profile_likes.php', [
                    'likes' => $likes,
                    'is_own' => $is_own_profile
                ]);
                break;
            }
        case SUBSCRIPTIONS:
            {
                $page_count =  get_profile_subscriptions_total_pages ($connection, $user_id, RECORDS_PER_PAGE);
                $subcriptions = get_user_subscriptions($connection, $user_id, RECORDS_PER_PAGE, ($page - 1) * RECORDS_PER_PAGE);
                $auth_user_subscriptions = array_values(array_column(
                    $is_own_profile ? $subcriptions : get_auth_user_subscriptions($connection, $logged_user_id),
                    'blogger_id'));

                $content = include_template('profile_subscriptions.php', [
                    'subscriptions' => $subcriptions,
                    'is_own' => $is_own_profile,
                    'logged_user_id' => $logged_user_id,
                    'auth_user_subscriptions' => $auth_user_subscriptions
                ]);
                break;
            }
        default:
            {
                $content = '';
            }
    }

    if (!$is_ok) {
        http_response_code(404);
        $page_content = include_template('404.php', [
            'error_message' => 'В БД отсутствует информация о пользователе с id ' . $user_id
        ]);
    } else {
        /**
         * Если профиль собственный, то вообще для этой части шаблона информация о подписках лишняя
         * Можно передать в шаблон просто пустой массив и не ходить в базу
         */
        $auth_user_subscriptions = $is_own_profile ? [] : (
            $auth_user_subscriptions ?? array_values(array_column(
                $is_own_profile ? $subcriptions : get_auth_user_subscriptions($connection, $logged_user_id),
                'blogger_id'))
        );

        $pagination_content = include_template('pagination.php', [
            'page_count' => $page_count,
            'pages' => range(1, $page_count),
            'active_page' => $page,
            'active_query' => $_SERVER['QUERY_STRING'],
            'active_script' => $_SERVER['SCRIPT_NAME']
        ]);

        $page_content = include_template('profile.php', [
            'user' => $db_user,
            'profile_tab_content' => $content,
            'active_tab' => $active_tab,
            'active_user' => $user,
            'active_query' => $_SERVER['QUERY_STRING'],
            'active_script' =>  $_SERVER['SCRIPT_NAME'],
            'is_own' => $is_own_profile,
            'auth_user_subscriptions' => $auth_user_subscriptions,
            'pagination_content' => $pagination_content ?? ''
        ]);

        $_SESSION[CAPTURED_SESSION]['current_user'] = $user_id;
        $_SESSION[CAPTURED_SESSION]['current_tab'] = $active_tab;
    }

    $header_content = include_template('header_logged.php', [
        'user_name' => get_auth_user_property('name'),
        'active_content' => '',
        'filter_type' => null,
        'filter_value' => null,
        'search_string' => $search_string,
        'unread_count' => get_unread_count($connection, get_auth_user_property('id'))
    ]);

    $layout_content = include_template('layout.php',
        [
            'header_content' => $header_content,
            'page_content' => $page_content,
            'title' => 'Readme: профиль',
            'is_auth' => is_auth_user(),
            'body_classname' => is_auth_user() ? 'page--main' : '',
            'user_name' => get_auth_user_property('name'),
            'js_scripts' => ['backend.js', 'ajax.js', 'ajax_subscriptions.js']
        ]);

    print($layout_content);
