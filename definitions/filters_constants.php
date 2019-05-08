<?php
    //mytodo Вообще-то оптимизировать структуру констант пора бы уже

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

    define('FILTER_TEXT', [
        FILTER_ALL => 'Все',
        FILTER_PHOTOS => 'Фото',
        FILTER_VIDEOS => 'Видео',
        FILTER_TEXTS => 'Заметки',
        FILTER_QUOTES => 'Цитаты',
        FILTER_LINKS => 'Ссылки'
    ]);

    define('DEFAULT_FILTER', FILTER_ALL);

    define('FILTER_NAME', [
        'Все',
        'Фото',
        'Видео',
        'Заметка',
        'Цитата',
        'Ссылка'
    ]);

    define('FILTER_ALIAS', [
        FILTER_ALL,
        FILTER_PHOTOS,
        FILTER_VIDEOS,
        FILTER_TEXTS,
        FILTER_QUOTES,
        FILTER_LINKS
    ]);

    define('TEMPLATE_NAME', [
        mb_substr(FILTER_PHOTOS, 0, -1),
        mb_substr(FILTER_PHOTOS, 0, -1),
        mb_substr(FILTER_VIDEOS, 0, -1),
        mb_substr(FILTER_TEXTS, 0, -1),
        mb_substr(FILTER_QUOTES, 0, -1),
        mb_substr(FILTER_LINKS, 0, -1)
    ]);

    define('FILTER_SVG', [
        '',
        '<svg class="filters__icon" width="22" height="18">
                                <use xlink:href="#icon-filter-photo"></use>
                            </svg>',
        '<svg class="filters__icon" width="24" height="16">
                                <use xlink:href="#icon-filter-video"></use>
                            </svg>',
        ' <svg class="filters__icon" width="20" height="21">
                                <use xlink:href="#icon-filter-text"></use>
                            </svg>',
        '<svg class="filters__icon" width="21" height="20">
                                <use xlink:href="#icon-filter-quote"></use>
                            </svg>',
        '<svg class="filters__icon" width="21" height="18">
                                <use xlink:href="#icon-filter-link"></use>
                            </svg>'
    ]);