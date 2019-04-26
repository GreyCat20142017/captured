<?php

    session_start();
    require_once('init.php');

    $errors = [];
    $user = [];

    $is_ok = true;

    if (!is_auth_user()) {
        http_response_code(302);
        header('Location: login.php');
    }

    $active_filter = isset($_GET['filter']) ? strip_tags($_GET['filter']) : null;

    $posts = get_posts($connection, $active_filter);
    $banners = get_banners($connection);

    $page_content = include_template('feed.php', [
        'user' => $user,
        'posts_content' => get_post_content($posts),
        'promo_content' => get_various_content($banners, 'promo.php', 'banner'),
        'active_tab' => empty($active_filter) ? FILTER_ALL : $active_filter,
        'content_classname' =>  empty($posts) ? 'feed__wrapper feed__wrapper--no-content' : 'feed__wrapper'
    ]);

    $header_content = include_template('header_logged.php', [
        'user_name' => get_auth_user_property('name'),
        'active_content' => CONTENT_FEED,
        'filter_type' => 'filter',
        'filter_value' => $active_filter
    ]);

    $layout_content = include_template('layout.php',
        [
            'header_content' => $header_content,
            'page_content' => $page_content,
            'title' => empty($posts) ? 'Readme: моя лента (нет публикаций в текущем разделе)' : 'Readme: все',
            'is_auth' => is_auth_user(),
            'body_classname' => is_auth_user() ? 'page--main' : '',
            'user_name' => get_auth_user_property('name')
        ]);

    print($layout_content);