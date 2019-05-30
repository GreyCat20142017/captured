<?php
    session_start();
    require_once('init.php');

    if (!is_auth_user()) {
        exit();
    }

    if (!empty($_GET['change_like']) && !empty($_GET['post'])) {

        $user_id = intval(get_auth_user_property('id'));
        $post_id = intval(strip_tags($_GET['post']));
        switch_like($connection, $user_id, $post_id);
        header('Content-Type: application/json');
        echo json_encode([
            'post' => $post_id
        ]);
    }

    if (!empty($_GET['get_likes_count']) && !empty($_GET['post'])) {

        $post_id = intval(strip_tags($_GET['post']));
        $count = get_likes_count($connection, $post_id);
        header('Content-Type: application/json');
        echo json_encode([
            'post' => $post_id,
            'likes' => $count
        ]);
    }

    if (!empty($_GET['change_repost']) && !empty($_GET['post'])) {

        $user_id = intval(get_auth_user_property('id'));
        $post_id = intval(strip_tags($_GET['post']));
        switch_repost($connection, $user_id, $post_id);
        header('Content-Type: application/json');
        echo json_encode([
            'post' => $post_id
        ]);

    }

    if (!empty($_GET['get_reposts_count']) && !empty($_GET['post'])) {

        $post_id = intval(strip_tags($_GET['post']));
        $count = get_reposts_count($connection, $post_id);
        header('Content-Type: application/json');
        echo json_encode([
            'post' => $post_id,
            'reposts' => $count
        ]);

    }

