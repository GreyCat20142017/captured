<?php

    session_start();
    require_once('init.php');

    $errors = [];
    $user = [];
    $db_user = [];

    $is_ok = true;

    if (is_auth_user()) {
        header('Location: feed.php');
    }

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
        ];

        $errors = get_validation_result($fields, $user, $_FILES);
        $status_ok = empty(get_form_validation_classname($errors));
        if ($status_ok) {
            $db_status_ok = false;
            $email = get_assoc_element($user, 'email');
            $check_result = get_user_by_email($connection, $email);
            switch (get_assoc_element($check_result, 'status')) {
                case get_assoc_element(GET_DATA_STATUS, 'data_received'):
                    $db_status_ok = true;
                    $db_user = get_assoc_element($check_result, 'data');
                    break;
                case get_assoc_element(GET_DATA_STATUS, 'no_data'):
                    add_error_message($errors, 'email', 'Пользователь с таким email не зарегистрирован на сайте');
                    break;
                case get_assoc_element(GET_DATA_STATUS, 'db_error'):
                    add_error_message($errors, 'email', 'Произошла ошибка при получении данных пользователей');
                    break;
                default:
                    break;
            }
            if ($db_status_ok) {
                $status_text = '';
                $password_data = recovery_and_get_password($connection, $email);
                if (!empty($password_data)) {
                    //send_new_password($password_data);
                }
                header('Location: login.php');
            }
        }
    }

    $page_content = include_template('password_recovery.php', [
        'user' => $user,
        'errors' => $errors,
        'title' => get_field_validation_message($errors, 'email')
    ]);

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
