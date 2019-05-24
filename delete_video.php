<?php
    if(!empty($post)) {
        set_assoc_element($post, 'video_link', '');
    }
    if (!empty($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
