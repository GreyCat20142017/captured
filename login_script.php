<?php

    $errors = [];
    $user = [];
    $db_user = [];
    $status_text = 'Вход на сайт невозможен';

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
            'password' => ['description' => 'Пароль', 'required' => true, 'validation_rules' => ['check_length:2:30']]
        ];

        $errors = get_validation_result($fields, $user, $_FILES);
        $status_ok = empty(get_form_validation_classname($errors));
        if ($status_ok) {
            $db_status_ok = false;
            $check_result = get_user_by_email($connection, get_assoc_element($user, 'email'));
            switch (get_assoc_element($check_result, 'status')) {
                case get_assoc_element(GET_DATA_STATUS, 'data_received'):
                    $db_status_ok = true;
                    $db_user = get_assoc_element($check_result, 'data');
                    if (!password_verify(get_assoc_element($user, 'password'),
                        get_assoc_element($db_user, 'user_password'))) {
                        $db_status_ok = false;
                        add_error_message($errors, 'password', 'Вы ввели неверный пароль');
                    }
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
                $use_mdb = MDB;

                $_SESSION[CAPTURED_SESSION] = [
                    'id' => get_assoc_element($db_user, 'id'),
                    'name' => get_assoc_element($db_user, 'name'),
                    'avatar' => get_assoc_element($db_user, 'avatar'),
                    'mdb' => $use_mdb
                ];
                header('Location: index.php');
            }
        }
    }
