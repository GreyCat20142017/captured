<?php

    session_start();
    require_once('init.php');

    $errors = [];
    $post = [];
    $user = [];

    $is_ok = true;

    if (!is_auth_user()) {
        http_response_code(302);
        header('Location: login.php');
    }

    require_once('adding_validation.php');


    $active_tab = isset($_GET['tab']) ? intval(strip_tags($_GET['tab'])) : 1;
    $tab_template_name = 'adding_' . get_element(TEMPLATE_NAME, $active_tab) . '.php';


    $tab_content = include_template($tab_template_name, [
        'errors' => $errors,
        'post' => $post
    ]);

    $page_content = include_template('adding.php', [
        'tab_content' => $tab_content,
        'active_tab' => $active_tab,
        'filters_content' => get_filters_content(
            $active_tab,
            $_SERVER['PHP_SELF'],
            $_SERVER['QUERY_STRING'],
            'adding-post__tabs-item filters__item tabs__item',
            'adding-post__tabs-link filters__button button',
            '',
            true)
    ]);

    $header_content = include_template('header_logged.php', [
        'user_name' => get_auth_user_property('name'),
        'active_content' => null,
        'filter_type' => 'none',
        'filter_value' => null
    ]);

    $layout_content = include_template('layout.php',
        [
            'header_content' => $header_content,
            'page_content' => $page_content,
            'title' => 'Readme: добавление публикации',
            'is_auth' => is_auth_user(),
            'body_classname' => is_auth_user() ? 'page--main  page__main--adding-post' : '',
            'user_name' => get_auth_user_property('name')
        ]);

    print($layout_content);