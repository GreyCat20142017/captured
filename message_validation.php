<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_message'])) {

        $fields = [
            'message' => ['description' => 'Сообщение', 'required' => true]
        ];

        $message = array_map(function ($item) {
            return trim(strip_tags($item));
        }, $_POST);

        $errors = get_validation_result($fields, $message, $_FILES);

        $status_ok = empty(get_form_validation_classname($errors)) && is_auth_user()
            && ($user_id ?? false) && ($correspondent_id ?? false);

        if ($status_ok && $user_id !== $correspondent_id) {
            add_message($connection, get_assoc_element($message, 'message'), $user_id, $correspondent_id);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }