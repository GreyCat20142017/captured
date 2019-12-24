<?php
    /**
     * Константы валидации и типов
     */
    define('ERROR_KEY', 'error');
    define('EMPTY_ITEM', 'Выберите элемент');
    define('FILE_RULE', 'file_validation');
    define('HASH_RULE', 'hashtag_validation');
    define('MAX_FILE_SIZE', 204800);

    define('PHOTOS', 'photos');
    define('VIDEOS', 'videos');
    define('AVATARS', 'avatars');

    define('VALID_FILE_TYPES', [
        'image/png',
        'image/jpeg',
        'image/svg+xml',
        'image/svg+xmlns',
        'image/svg'
    ]);

    define('HASH_TAG_MIN_LENGTH', 2);
    define('HASH_TAG_MAX_LENGTH', 20);
    define('HASH_TAG_MAX_AMOUNT', 5);

    define('NEED_START_HASH', 'needStartHash');
    define('NOT_ONLY_HASH', 'notOnlyHash');
    define('MAX_HASH_LENGTH', 'maxLengthLimit');
    define('NEED_SPACE', 'needSpace');
    define('DOUBLE_DETECTED', 'doubleDetected');
    define('TOO_MANY_TAGS', 'tooManyTags');

    define('SINGLE_TAG_RULES', [
        NEED_START_HASH => 'хэш-тег должен начинаться с символа # (решётка)',
        NOT_ONLY_HASH => 'хеш-тег не может состоять только из одной решётки',
        MAX_HASH_LENGTH => 'максимальная длина одного хэш-тега 20 символов, включая решётку',
        NEED_SPACE => 'хеш-теги должны разделяться пробелами'
    ]);

    define('COMMON_TAG_RULES', [
        DOUBLE_DETECTED => 'один хэш-тег не может быть использован дважды (регистр не учитывается)',
        TOO_MANY_TAGS => 'нельзя указать больше пяти хэш-тегов'
    ]);
