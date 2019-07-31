<?php

    set_include_path(get_include_path() . PATH_SEPARATOR . 'definitions');
    date_default_timezone_set('Europe/Moscow');
    require __DIR__ . '/vendor/autoload.php';

    require_once('functions.php');

//    $use_mdb = !empty(get_auth_user_property('mdb', MDB));
//    $GLOBALS['template_path'] = $use_mdb ? MDB_TEMPLATE_FOLDER : TEMPLATE_FOLDER;
    $use_mdb = MDB;
    $GLOBALS['template_path'] = MDB_TEMPLATE_FOLDER;

