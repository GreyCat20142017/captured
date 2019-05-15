<?php

    session_start();
    require_once('init.php');

    $search_string = '';
    $errors = [];
    $user = [];

    $is_ok = true;

    if (!is_auth_user()) {
        http_response_code(302);
        header('Location: login.php');
    }

    $active_tab = isset($_GET['filter']) ? strip_tags($_GET['filter']) : null;

    $posts = get_posts_for_feed($connection, get_auth_user_property('id'), $active_tab);
    $banners = get_banners($connection);

    $page_content = include_template('feed.php', [
        'user' => $user,
        'posts_content' => get_post_content($posts, 'feed'),
        'promo_content' => get_various_content($banners, 'promo.php', 'banner'),
        'active_tab' => empty($active_tab) ? FILTER_ALL : $active_tab,
        'content_classname' =>  empty($posts) ? 'feed__wrapper feed__wrapper--no-content' : 'feed__wrapper',
        'filters_content' => get_filters_content(
            $active_tab,
            $_SERVER['PHP_SELF'],
            $_SERVER['QUERY_STRING'],
            'feed__filters-item filters__item',
            'filters__button button ',
            'visually-hidden',
            false)
    ]);

    $header_content = include_template('header_logged.php', [
        'user_name' => get_auth_user_property('name'),
        'active_content' => CONTENT_FEED,
        'filter_type' => 'filter',
        'filter_value' => $active_tab,
        'search_string' => $search_string
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