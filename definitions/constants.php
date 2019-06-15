<?php

    require_once ('filters_constants.php');
    require_once ('validation_constants.php');

    define('SORT_COMMENTS', 'comments_count');
    define('SORT_LIKES', 'likes_count');
    define('SORT_DATE', 'post_id');

    define('MDB', true);
    define('TRY_GET_FAVICONS', false);
    define('TEMPLATE_FOLDER', MDB ? 'mdbtemplates/' : 'templates/');

    define('MAX_TEXT_LENGTH', 222);
    define('SHORT_TEXT_LENGTH', 22);
    define('RECORDS_PER_PAGE', 6);
    define('COMMENTS_PREVIEW_COUNT', 3);
    define('BANNERS_COUNT', 3);

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

    define('POST_IDENTIFICATOR', 'data-post');
    define('BLOGGER_IDENTIFICATOR', 'data-blogger');
    define('SUBSCRIBER_IDENTIFICATOR', 'data-subscriber');
