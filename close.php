<?php
    session_start();
    require_once('init.php');

    header("Location: " . get_auth_user_property('back', 'profile.php'));
