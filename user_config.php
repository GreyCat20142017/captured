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

    $active_tab = isset($_GET['section']) ? intval(trim(strip_tags($_GET['section']))) : 1;

    dump($active_tab);

    $db_user = get_user_basic_info($connection, $user_id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = array_map(function ($item) {
            return trim(strip_tags($item));
        }, $_POST);

        if (isset($_POST['change_base'])) {
            $fields = [
                'email' => ['description' => 'E-mail', 'required' => true, 'validation_rules' => ['email_validation']],
                'name' => ['description' => 'Имя пользователя', 'required' => true],
                'text-info' => ['description' => 'Информация', 'required' => true],
                'avatar' => ['description' => 'Аватар', 'required' => false, 'validation_rules' => [FILE_RULE]]
            ];
        }

        if (isset($_POST['change_password'])) {
            $fields = [
                'password' => [
                    'description' => 'Пароль',
                    'required' => true,
                    'validation_rules' => ['equal_to:password:password-repeat']
                ],
                'password-repeat' => [
                    'description' => 'Пароль',
                    'required' => true,
                    'validation_rules' => ['equal_to:password:password-repeat']]
            ];
        }

        $errors = get_validation_result($fields, $user, $_FILES);
        $status_ok = empty(get_form_validation_classname($errors));
        $image_fields = get_file_fields($fields);

        if ($status_ok) {
            $upload_to = get_assoc_element(PATHS, AVATARS);
            try_upload_files($image_fields, $_FILES, $errors, $upload_to, $user);
            $update_result = update_user($connection, $user);
            if ($update_result) {
               header('Location:' . $_SERVER['HTTP_REFERER']);
            } else {
                $status_text = 'Не удалось обновить параметры';
                exit();
            }
        } else {
            $status_text = 'Необходимо исправить ошибки перед повторной отправкой формы';
            $_FILES = [];
            foreach ($image_fields as $key_image_field => $image_field) {
                $description = get_assoc_element($fields, $key_image_field);
                set_assoc_element($description, 'errors', []);
            }
        }
    }

    $page_content = include_template('user_config.php', [
        'user' => $db_user,
        'errors' => $errors,
        'active' => $active_tab
    ]);

    $header_content = include_template('header_logged.php', [
        'user_name' => get_auth_user_property('name'),
        'active_content' => CONTENT_FEED,
        'filter_type' => '',
        'filter_value' => '',
        'search_string' => '',
        'unread_count' => get_unread_count($connection, get_auth_user_property('id'))
    ]);

    $layout_content = include_template('layout.php', [
        'header_content' => $header_content,
        'page_content' => $page_content,
        'title' => 'Readme: все',
        'is_auth' => is_auth_user(),
        'body_classname' => '',
        'user_name' => get_auth_user_property('name'),
        'js_scripts' => ['photo.js']
    ]);

    print($layout_content);