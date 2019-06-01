<?php
    session_start();
    require_once('init.php');

    if (!is_auth_user()) {
        dump(is_auth_user());
        exit();
    }

    /**
     * Лайки -----------------------------------------------------
     */
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

    /**
     * Репосты ---------------------------------------------------
     */
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

    /**
     * Подписки --------------------------------------------------
     */
    if (!empty($_GET['change_subscription'])  && !empty($_GET['blogger'])) {

        $subscriber_id = intval(get_auth_user_property('id'));
        $blogger_id = intval(strip_tags($_GET['blogger']));
        $subscribed = switch_subscription($connection, $subscriber_id, $blogger_id);
        header('Content-Type: application/json');
        echo json_encode([
            'blogger' => $blogger_id,
            'subscribed' => $subscribed
        ]);

    }

    if (!empty($_GET['get_subscribers_count']) && !empty($_GET['blogger'])) {

        $blogger_id = intval(strip_tags($_GET['blogger']));
        $count = get_subscribers_count($connection, $blogger_id);
        header('Content-Type: application/json');
        echo json_encode([
            'blogger' => $blogger_id,
            'subscribers' => $count
        ]);

    }

