<?php

    session_start();
    require_once('init.php');

    $is_ok = true;
    $logo_content = include_template('logo.php', []);

    if (is_auth_user()) {
        $page_content = include_template('feed.php', []);
    } else {
        $page_content = include_template('main.php', []);
    }

    $layout_content = include_template('layout.php',
        [
            'page_content' => $page_content,
            'title' => 'Readme: все',
            'is_auth' => is_auth_user(),
            'body_classname' => is_auth_user() ? "page--main" : "",
            'user_name' => get_auth_user_property('name')
        ]);

    print($layout_content);


