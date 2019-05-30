<?php

    session_start();
    require_once('init.php');

    if (!is_auth_user()) {
        http_response_code(302);
        header('Location: login.php');
    }

    $errors = [];
    $user = [];

    $is_ok = true;
    $user_id = intval(get_auth_user_property('id'));
    $search_string = get_auth_user_property('last_search', $search_string ?? '') ?? '';

    $db_user = get_user_basic_info($connection, $user_id);

    dump($db_user);

    $page_content = include_template('user_config.php', [
        'user' => $db_user,
        'errors' => $errors
    ]);

    $header_content = include_template('header_logged.php', [
        'user_name' => get_auth_user_property('name'),
        'active_content' => CONTENT_FEED,
        'filter_type' => '',
        'filter_value' => '',
        'search_string' => '',
        'unread_count' => get_unread_count($connection, get_auth_user_property('id'))
    ]);

    $layout_content = include_template('layout.php',
        [
            'header_content' => $header_content,
            'page_content' => $page_content,
            'title' => 'Readme: все',
            'is_auth' => is_auth_user(),
            'body_classname' => '',
            'user_name' => get_auth_user_property('name')
        ]);

    print($layout_content);