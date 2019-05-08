<?php

    session_start();
    require_once('init.php');

    $errors = [];
    $user = [];

    $is_ok = true;

    $active_tab = isset($_GET['filter']) ? trim(strip_tags($_GET['filter'])) : null;

    $posts = [];

    $page_content = include_template('popular.php', [
        'user' => $user,
        'posts_content' => get_post_content($posts),
        'active_tab' => empty($active_filter) ? FILTER_ALL : $active_filter,
        'content_classname' => empty($posts) ? 'feed__wrapper feed__wrapper--no-content' : 'feed__wrapper',
        'active_tab' => $active_tab,
        'filters_content' => get_filters_content(
            $active_tab,
            'popular.php',
            'popular__filters-item filters__item',
            'filters__button button ',
            'visually-hidden',
            false)
    ]);

    $header_content = include_template('header_logged.php', [
        'user_name' => get_auth_user_property('name'),
        'active_content' => CONTENT_POPULAR,
        'filter_type' => 'filter',
        'filter_value' => $active_tab
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