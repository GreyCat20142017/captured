<?php

    session_start();
    require_once('init.php');

    $errors = [];
    $user = [];
    $db_user = [];

    $is_ok = true;

    require_once('login_script.php');

    if (!is_auth_user()) {
        header('Location: login.php', true, 403);
    }

    $user_id = intval(get_auth_user_property('id'));
    $db_user = get_user_info($connection, $user_id);

    if (empty($db_user)) {
        logout_current_user();
        header('Location: login.php', true, 403);
    }

    $active_param = isset($_GET['tab']) ? intval(strip_tags($_GET['tab'])) : 1;
    $active_param = (($active_param <= 0) || ($active_param > count(TABS))) ? 1 : $active_param;

    $active_tab = TABS[$active_param - 1];

    switch ($active_tab) {
        case POSTS:
            {
                $posts = get_posts_for_profile($connection, $user_id);
                $content = include_template('profile_posts.php', [
                    'inner_part' => get_post_content($posts, false)
                ]);
                break;
            }
        case LIKES:
            {
                $content = include_template('profile_likes.php', []);
                break;
            }
        case SUBSCRIPTIONS:
            {
                $content = include_template('profile_subscriptions.php', []);
                break;
            }
        default:
            {
                $content = '';
            }
    }

    $page_content = include_template('profile.php', [
        'user' => $db_user,
        'profile_tab_content' => $content,
        'active_tab' => $active_tab
    ]);

    $header_content = include_template('header_logged.php', [
        'user_name' => get_auth_user_property('name')
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