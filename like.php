<?php

    session_start();
    require_once('init.php');

    if (!is_auth_user()) {
        exit();
    }

    if (!empty($_GET['user']) && !empty($_GET['post'])) {
        $user_id = intval(strip_tags($_GET['user']));
        $post_id = intval(strip_tags($_GET['post']));

        switch_like($connection, $user_id, $post_id);
         header("Location: " . $_SERVER['HTTP_REFERER']);
    }