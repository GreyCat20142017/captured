<?php

    session_start();
    require_once('init.php');

    if (!is_auth_user()) {
        exit();
    }

    if (!empty($_GET['post'])) {

        $post_id = intval(strip_tags($_GET['post']));
        $result = delete_post($connection, $post_id, intval(get_auth_user_property('id')));
        if ($result) {
            header("Location: profile.php");
        } else {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }