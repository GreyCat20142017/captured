<?php

    define('TEMPLATE_FOLDER', 'templates/');

    define('EMPTY_FILE', '/img/no_image.svg');
    define('EMPTY_AVATAR', '/img/user.svg');

    define('MAX_TEXT_LENGTH', 222);
    define('RECORDS_PER_PAGE', 6);

    /**
     * Константы валидации и типов
     */
    define('ERROR_KEY', 'error');
    define('EMPTY_CATEGORY', 'Выберите категорию');
    define('FILE_RULE', 'file_validation');
    define('MAX_FILE_SIZE', 200000);


    define('PHOTOS', 'photos');
    define('VIDEOS', 'videos');
    define('AVATARS', 'avatars');

    define('VALID_FILE_TYPES', [
        'image/png',
        'image/jpeg']);

    define('PATHS', [
        PHOTOS => 'photos/',
        VIDEOS => 'videos/',
        AVATARS => 'avatars/'
    ]);

//    define('VALID_FILE_TYPES', [
//        PHOTOS => 'photos/', ['image/png', 'image/jpeg'],
//        VIDEOS => 'videos/',
//        AVATARS => 'avatars/', ['image/png', 'image/jpeg', 'image/svg']
//    ]);

    define('GET_DATA_STATUS', [
        'db_error' => 'Ошибка БД при получении данных',
        'no_data' => 'В выборке нет данных',
        'data_received' => 'Данные получены',
        'data_added' => 'Данные добавлены'
    ]);

    define('CAPTURED_SESSION', 'current_user');

    define('TEST_EMAIL', 'nrz3siaatg81@mail.ru');

    /**
     * Tabs для профиля пользователя
     */

    define('POSTS', 'posts');
    define('LIKES', 'likes');
    define('SUBSCRIPTIONS', 'subscriptions');
    define('TABS', [POSTS, LIKES, SUBSCRIPTIONS]);

    define('FILTER_ALL', 'all');
    define('FILTER_PHOTOS', 'photos');
    define('FILTER_VIDEOS', 'videos');
    define('FILTER_TEXTS', 'texts');
    define('FILTER_QUOTES', 'quotes');
    define('FILTER_LINKS', 'links');

    define('FILTER_CONDITION', [
        FILTER_ALL => '',
        FILTER_PHOTOS => '',
        FILTER_VIDEOS => '',
        FILTER_TEXTS => '',
        FILTER_QUOTES => '',
        FILTER_LINKS => ''
    ]);

    define('FILTER_TEXT', [
        FILTER_ALL => 'Все',
        FILTER_PHOTOS => 'Фото',
        FILTER_VIDEOS => 'Видео',
        FILTER_TEXTS => 'Заметки',
        FILTER_QUOTES => 'Цитаты',
        FILTER_LINKS => 'Ссылки'
    ]);

    define('DEFAULT_FILTER', FILTER_ALL);

    define('CUSTOM_FILE_PROPERTY', 'Original filename');
    define('UI_START', 'UI');
    define('TRANCATED_COUNT', mb_strlen(uniqid(UI_START, true)) + 1);


