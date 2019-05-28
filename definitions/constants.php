<?php

    require_once ('filters_constants.php');

    define('SORT_COMMENTS', 'comments_count');
    define('SORT_LIKES', 'likes_count');
    define('SORT_DATE', 'post_id');

    define('TEMPLATE_FOLDER', 'templates/');

    define('MAX_TEXT_LENGTH', 222);
    define('SHORT_TEXT_LENGTH', 22);
    define('RECORDS_PER_PAGE', 6);
    define('COMMENTS_PREVIEW_COUNT', 3);

    /**
     * Константы валидации и типов
     */
    define('ERROR_KEY', 'error');
    define('EMPTY_ITEM', 'Выберите элемент');
    define('FILE_RULE', 'file_validation');
    define('MAX_FILE_SIZE', 200000);


    define('PHOTOS', 'photos');
    define('VIDEOS', 'videos');
    define('AVATARS', 'avatars');

    define('VALID_FILE_TYPES', [
        'image/png',
        'image/jpeg',
        'image/svg+xml',
        'image/svg+xmlns',
        'text/plain'
    ]);

    define('PATHS', [
        PHOTOS => 'img/photos/',
        VIDEOS => 'img/videos/',
        AVATARS => 'img/avatars/'
    ]);

    define('EMPTY_FILE', '/img/no_image.svg');
    define('EMPTY_AVATAR', '/img/user.svg');


    define('GET_DATA_STATUS', [
        'db_error' => 'Ошибка БД при получении данных',
        'no_data' => 'В выборке нет данных',
        'data_received' => 'Данные получены',
        'data_added' => 'Данные добавлены'
    ]);

    define('CAPTURED_SESSION', 'current_user');

    define('TEST_EMAIL', 'nrz3siaatg81@mail.ru');

    /**
     * Типы контента, фильтров и Tabs для профиля пользователя
     */

    define('CONTENT_FEED', 'feed');
    define('CONTENT_POPULAR', 'popular');
    define('CONTENT_MESSAGES', 'messages');

    define('CUSTOM_FILE_PROPERTY', 'Original filename');
    define('UI_START', 'UI');
    define('TRANCATED_COUNT', mb_strlen(uniqid(UI_START, true)) + 1);

    define('YOUTUBE_ID_LENGTH', 11);