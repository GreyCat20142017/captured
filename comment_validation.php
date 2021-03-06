<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_comment'])) {

        $fields = [
            'comment' => [
                'description' => 'Комментарий',
                'required' => true,
                'validation_rules' => ['check_length:0:255']
            ]
        ];

        $comment = array_map(function ($item) {
            return trim(strip_tags($item));
        }, $_POST);

        $errors = get_validation_result($fields, $comment, $_FILES);
        $status_ok = empty(get_form_validation_classname($errors)) && is_auth_user() && ($is_post_ok ?? false);

        if ($status_ok) {
            add_comment($connection, get_assoc_element($comment, 'comment'), get_auth_user_property('id'), $post_id);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }