<?php

    session_start();
    require_once('init.php');

    $search_string = '';
    $errors = [];
    $user = [];
    $db_user = [];
    $is_ok = true;

    if (!is_auth_user()) {
        http_response_code(302);
        header('Location: login.php');
    }

    $logged_user_id = intval(get_auth_user_property('id'));

    if (isset($_GET['user'])) {
        $user_id = isset($_GET['user']) ? intval(strip_tags($_GET['user'])) : null;
    } else {
        $user_id = $logged_user_id;
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

    switch ($active_tab) {
        case POSTS:
            {
                $posts = get_posts_for_profile($connection, $user_id);
                $content = include_template('profile_posts.php', [
                    'inner_part' => get_post_content($posts, 'profile', false)
                ]);
                break;
            }
        case LIKES:
            {
                $likes = get_authors_likes($connection, $user_id);
                $content = include_template('profile_likes.php', [
                    'likes' => $likes,
                    'is_own' => $is_own_profile
                ]);
                break;
            }
        case SUBSCRIPTIONS:
            {
                $subcriptions = get_user_subscriptions($connection, $user_id);
                $content = include_template('profile_subscriptions.php', [
                    'subscriptions' => $subcriptions,
                    'is_own' => $is_own_profile,
                    'logged_user_id' => $logged_user_id
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
        $page_content = include_template('profile.php', [
            'user' => $db_user,
            'profile_tab_content' => $content,
            'active_tab' => $active_tab,
            'active_user' => $user,
            'active_query' => $_SERVER['QUERY_STRING'],
            'active_script' =>  $_SERVER['PHP_SELF'],
            'is_own' => $is_own_profile
        ]);

        $_SESSION[CAPTURED_SESSION]['current_user'] = $user_id;
        $_SESSION[CAPTURED_SESSION]['current_tab'] = $active_tab;
    }

    $header_content = include_template('header_logged.php', [
        'user_name' => get_auth_user_property('name'),
        'active_content' => '',
        'filter_type' => null,
        'filter_value' => null,
        'search_string' => $search_string
    ]);

    $layout_content = include_template('layout.php',
        [
            'header_content' => $header_content,
            'page_content' => $page_content,
            'title' => 'Readme: профиль',
            'is_auth' => is_auth_user(),
            'body_classname' => is_auth_user() ? 'page--main' : '',
            'user_name' => get_auth_user_property('name')
        ]);

    print($layout_content);