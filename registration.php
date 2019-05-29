<?php

    session_start();
    require_once('init.php');

    $errors = [];
    $user = [];
    $status_text = '';
    $search_string = get_auth_user_property('last_search', $search_string ?? '') ?? '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = array_map(function ($item) {
            return trim(strip_tags($item));
        }, $_POST);

        /**
         * Описания полей для валидации. Если правила слишком специфичны, то в required для обязательных полей
         * нужно установить false, при этом заполнение контролировать специфическими правилами
         */
        $fields = [
            'email' => ['description' => 'E-mail', 'required' => true, 'validation_rules' => ['email_validation']],
            'password' => [
                'description' => 'Пароль',
                'required' => true,
                'validation_rules' => ['equal_to:password:password-repeat']
            ],
            'password-repeat' => [
                'description' => 'Пароль',
                'required' => true,
                'validation_rules' => ['equal_to:password:password-repeat']
            ],
            'name' => ['description' => 'Имя пользователя', 'required' => true],
            'text-info' => ['description' => 'Информация', 'required' => true],
            'userpic-file' => ['description' => 'Аватар', 'required' => false, 'validation_rules' => [FILE_RULE]]
        ];

        $errors = get_validation_result($fields, $user, $_FILES);
        $status_ok = empty(get_form_validation_classname($errors));
        $image_fields = get_file_fields($fields);

        if ($status_ok) {
            $upload_to = get_assoc_element(PATHS, AVATARS);
            try_upload_files($image_fields, $_FILES, $errors, $upload_to, $user);
            $add_result = add_user($connection, $user);
            if ($add_result) {
                if (isset($add_result['id'])) {
                    add_error_message($errors, 'email', 'Пользователь с таким email уже существует!');
                } else {
                    http_response_code(302);
                    header('Location: login.php');
                }
            } else {
                $status_text = 'Не удалось добавить пользователя в БД';
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

    $page_content = include_template('registration.php', [
        'user' => $user,
        'errors' => $errors,
        'status_text' => $status_text ?? ''
    ]);

    $header_content = include_template(is_auth_user() ? 'header_logged.php' : 'header_normal.php', [
        'user_name' => get_auth_user_property('name'),
        'active_content' => '',
        'filter_type' => null,
        'filter_value' => null,
        'unread_count' => is_auth_user() ? get_unread_count($connection, get_auth_user_property('id')) : 0
    ]);

    $layout_content = include_template('layout.php',
        [
            'header_content' => $header_content,
            'page_content' => $page_content,
            'title' => 'Readme: все',
            'is_auth' => is_auth_user(),
            'body_classname' => is_auth_user() ? 'page--main' : '',
            'user_name' => get_auth_user_property('name'),
            'need_js' => true
        ]);

    print($layout_content);