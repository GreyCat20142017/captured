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

    $correspondent_id = isset($_GET['user']) ? intval(strip_tags($_GET['user'])) : null;
    $user_id = intval(get_auth_user_property('id', 0));

    $messages = empty($correspondent_id) ? [] : get_messages($connection, $user_id, $correspondent_id);
    $totals = get_messages_totals($connection, get_auth_user_property('id', 0));

    $chat_content = empty($messages) ? '' : include_template('messages_chat.php', [
        'messages' => $messages
    ]);

    $page_content = include_template('messages.php', [
        'user' => $user,
        'correspondents' => $totals,
        'chat_content' => $chat_content,
        'active_user' => $correspondent_id
    ]);

    $header_content = include_template('header_logged.php', [
        'user_name' => get_auth_user_property('name'),
        'active_content' => CONTENT_MESSAGES,
        'filter_type' => 'user',
        'filter_value' => $correspondent_id
    ]);

    $layout_content = include_template('layout.php',  [
            'header_content' => $header_content,
            'page_content' => $page_content,
            'title' => 'Readme: все',
            'is_auth' => is_auth_user(),
            'body_classname' => is_auth_user() ? 'page--main' : '',
            'user_name' => get_auth_user_property('name')
        ]);

    print($layout_content);