<?php

    session_start();
    require_once('init.php');

    require_once('login_script.php');

    $page_content = include_template('login.php', [
        'errors' => $errors,
        'user' => $user,
        'status' => $status_text
    ]);

    $header_content = include_template('header_normal.php', [
        'active_content' => '',
        'filter_type' => null,
        'filter_value' => null
    ]);

    $layout_content = include_template('layout.php',
        [
            'page_content' => $page_content,
            'header_content' => $header_content,
            'body_classname' => is_auth_user() ? 'page--main' : '',
            'title' => 'Авторизация',
            'is_auth' => is_auth_user(),
            'user_name' => get_auth_user_property('name')
        ]);
    print($layout_content);