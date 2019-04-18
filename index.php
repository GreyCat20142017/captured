<?php

    session_start();
    require_once('init.php');

    $errors = [];
    $user = [];
    $db_user = [];

    $is_ok = true;

    require_once('login_script.php');

    if (is_auth_user()) {

        $posts = get_posts($connection);
        $banners = get_banners($connection);

        $page_content = include_template('feed.php', [
            'user' => $user,
            'posts_content'=> get_post_content($posts),
            'promo_content'=> get_various_content($banners, 'promo.php', 'banner')
        ]);

        $header_content = include_template('header_logged.php', [
            'user_name' => get_auth_user_property('name')
        ]);

    } else {

        $page_content = include_template('main.php', ['user' => $user]);
        $header_content = include_template('header_short.php', []);

    }

    $layout_content = include_template('layout.php',
        [
            'header_content' => $header_content,
            'page_content' => $page_content,
            'title' => 'Readme: все',
            'is_auth' => is_auth_user(),
            'body_classname' => is_auth_user() ? 'page--main' : '',
            'user_name' => get_auth_user_property('name')
        ]);

    print($layout_content);