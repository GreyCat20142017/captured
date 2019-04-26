<?php

    session_start();
    require_once('init.php');

    $errors = [];
    $user = [];
    $db_user = [];

    $is_ok = true;

    require_once('login_script.php');

    if (is_auth_user()) {
        header('Location: feed.php');
    }

    $page_content = include_template('main.php', ['user' => $user]);
    $header_content = include_template('header_short.php', []);

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