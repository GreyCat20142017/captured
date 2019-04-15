USE readme;

# Чистка таблиц
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE likes;
TRUNCATE TABLE comments;

TRUNCATE TABLE photos;
TRUNCATE TABLE videos;
TRUNCATE TABLE texts;
TRUNCATE TABLE quotes;
TRUNCATE TABLE links;

TRUNCATE TABLE posts;
TRUNCATE TABLE categories;
TRUNCATE TABLE users;
SET FOREIGN_KEY_CHECKS = 1;

# Добавление  списка категорий
INSERT INTO categories (name, content_type)
VALUES ('Фото', 'photos'),
       ('Видео', 'videos'),
       ('Текст', 'texts'),
       ('Цитата', 'quotes'),
       ('Ссылка', 'links');

# Добавление пользователей
INSERT INTO users (name, email, user_password, avatar, registration_date)
VALUES ('Василий Пупкин', 'vasya@mail.ru', '$2y$10$0GYFabnO4kWUhOhvSaOQGOsT3zHGyQBsSuRcgbtlUIV19u84TEEgW', 'ava_1.svg',
        DATE_ADD(NOW(), INTERVAL -2 MONTH)),
       ('Василиса Пупкина', 'vasilisaPupkina@mail.ru', '$2y$10$0GYFabnO4kWUhOhvSaOQGOsT3zHGyQBsSuRcgbtlUIV19u84TEEgW',
        'ava_2.svg',
        DATE_ADD(NOW(), INTERVAL -3 WEEK));

# Добавление постов
INSERT INTO posts (category_id, user_id, creation_date, title)
VALUES (4, 2, DATE_ADD(NOW(), INTERVAL -3 DAY), 'Цитата'),
       (4, 1, DATE_ADD(NOW(), INTERVAL -2 DAY), 'Цитата дня'),
       (3, 2, DATE_ADD(NOW(), INTERVAL -5 DAY), 'Полезный пост про Байкал'),
       (1, 1, DATE_ADD(NOW(), INTERVAL -2 DAY), 'Полезный пост про Байкал'),
       (5, 1, DATE_ADD(NOW(), INTERVAL -1 DAY), 'Про валидацию');


# Добавление контента
INSERT INTO quotes (post_id, text, author)
VALUES (1, 'Тысячи людей живут без любви, но никто — без воды.', 'Xью Оден'),
       (2, 'Осень наступила, мерзнут бобр и зай... Не ломай систему - тоже замерзай', 'Автор неизвестен');

INSERT INTO texts (post_id, text)
VALUES (3,
        'Озеро Байкал – огромное древнее озеро в горах Сибири к северу от монгольской границы. Байкал считается самым глубоким озером в мире.');

INSERT INTO photos (post_id, filename, original_filename)
VALUES (4, 'img/rock.jpg', 'rock.jpg');

INSERT INTO links (post_id, reference)
VALUES (5, 'https://laravel.com/docs/5.8/validation');
