<?php

    session_start();
    require_once('init.php');

    if (!is_auth_user()) {
        exit();
    }

    if (!empty($_GET['subscriber']) && !empty($_GET['blogger'])) {
        $subscriber_id = intval(strip_tags($_GET['subscriber']));
        $blogger_id = intval(strip_tags($_GET['blogger']));

        switch_subscription($connection, $subscriber_id, $blogger_id);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }