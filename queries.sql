USE readme;

# Чистка таблиц
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE likes;
TRUNCATE TABLE comments;

TRUNCATE TABLE messages;
TRUNCATE TABLE subscriptions;

TRUNCATE TABLE photos;
TRUNCATE TABLE videos;
TRUNCATE TABLE texts;
TRUNCATE TABLE quotes;
TRUNCATE TABLE links;

TRUNCATE TABLE posts;
TRUNCATE TABLE categories;
TRUNCATE TABLE users;

TRUNCATE TABLE banners;
SET FOREIGN_KEY_CHECKS = 1;

# Добавление  списка категорий
INSERT INTO categories (name, content_type)
VALUES ('Фото', 'photos'),
       ('Видео', 'videos'),
       ('Текст', 'texts'),
       ('Цитата', 'quotes'),
       ('Ссылка', 'links');

# Добавление пользователей
INSERT INTO users (id, name, email, user_password, avatar, registration_date, info)
VALUES (1, 'Василий Пупкин', 'vasya@mail.ru', '$2y$10$0GYFabnO4kWUhOhvSaOQGOsT3zHGyQBsSuRcgbtlUIV19u84TEEgW',
        'img/userpic-mark.jpg',
        DATE_ADD(NOW(), INTERVAL -2 MONTH), 'Любитель гор'),
       (2, 'Василиса Пупкина', 'zz@zz.zz', '$2y$10$0GYFabnO4kWUhOhvSaOQGOsT3zHGyQBsSuRcgbtlUIV19u84TEEgW',
        'img/userpic-larisa.jpg', DATE_ADD(NOW(), INTERVAL -3 WEEK), 'Котики - наше все!'),
       (3, 'Кукушкин К.К', 'qq@qq.qq', '$2y$10$zu1owVM2wNw9m/QsBTO45OcEosAdtV1tv4cK3GSrL.RBBWch639XG',
        'img/userpic.jpg',
        DATE_ADD(NOW(), INTERVAL -2 WEEK), 'Любитель птиц'),
       (4, 'Варечкина В.В', 'vv@vv.vv', '$2y$10$0GYFabnO4kWUhOhvSaOQGOsT3zHGyQBsSuRcgbtlUIV19u84TEEgW', '', DATE_ADD(NOW(), INTERVAL -2 WEEK),
        'Любитель рыбок');

# Добавление постов
INSERT INTO posts (category_id, user_id, creation_date, title, hashtag)
VALUES (4, 1, DATE_ADD(NOW(), INTERVAL -3 DAY), 'Цитата', '#стих'),
       (4, 4, DATE_ADD(NOW(), INTERVAL -2 DAY), 'Цитата дня', '#стих #поэтнезнайка'),
       (3, 1, DATE_ADD(NOW(), INTERVAL -5 DAY), 'Полезный пост про Байкал', '#nature'),
       (1, 2, DATE_ADD(NOW(), INTERVAL -2 DAY), 'Просто пост про Байкал',  '#nature #globe #photooftheday #canon #landscape #шикарныйвид'),
       (5, 3, DATE_ADD(NOW(), INTERVAL -1 DAY), 'Про валидацию', '#заумь');


# Добавление контента
INSERT INTO quotes (post_id, text, author)VALUES
       (2, 'Осень наступила, мерзнут бобр и зай... Не ломай систему - тоже замерзай', 'Автор неизвестен'),
       (1, 'Пусто в холодильнике - просто полный шиш. Облизал веревочку - доедаю мышь.', 'Автор неизвестен');

INSERT INTO texts (post_id, text)
VALUES (3,
        'Озеро Байкал – огромное древнее озеро в горах Сибири к северу от монгольской границы. Байкал считается самым глубоким озером в мире.');

INSERT INTO photos (post_id, filename, original_filename)
VALUES (4, 'img/rock.jpg', 'rock.jpg');

INSERT INTO links (post_id, reference, description)
VALUES (5, 'https://laravel.com/docs/5.8/validation', 'Основная трава секты свидетелей laravel');

INSERT INTO banners (text, creation_date, reference, reference_text)
VALUES ('Все в Laravel!', DATE_ADD(NOW(), INTERVAL -3 DAY), 'https://laravel.com/docs/5.8', 'Перейти'),
       ('Здесь могла быть ваша реклама', DATE_ADD(NOW(), INTERVAL -3 WEEK), '#', 'Разместить');

INSERT INTO subscriptions (subscriber_id, blogger_id, creation_date)
VALUES (1, 2, DATE_ADD(NOW(), INTERVAL -3 DAY)),
       (3, 2, DATE_ADD(NOW(), INTERVAL -2 DAY)),
       (3, 1, DATE_ADD(NOW(), INTERVAL -4 DAY));

INSERT INTO messages (from_id, to_id, creation_date, text)
VALUES (1, 2, DATE_ADD(NOW(), INTERVAL -3 DAY), 'Как поездка?'),
       (3, 2, DATE_ADD(NOW(), INTERVAL -2 DAY), '"Ты жива еще, моя старушка...?"'),
       (3, 1, DATE_ADD(NOW(), INTERVAL -4 DAY), 'Посмотрел последние фото - они супер!');

INSERT INTO likes (user_id, post_id, creation_date)
VALUES (1, 1, DATE_ADD(NOW(), INTERVAL -1 DAY)),
       (2, 3, DATE_ADD(NOW(), INTERVAL -1 DAY)),
       (1, 3, DATE_ADD(NOW(), INTERVAL -1 DAY)),
       (3, 5, DATE_ADD(NOW(), INTERVAL -2 DAY));

INSERT INTO comments (user_id, post_id, creation_date, comment_text)
VALUES (1, 5, DATE_ADD(NOW(), INTERVAL -1 DAY), 'Это здорово!'),
       (2, 5, DATE_ADD(NOW(), INTERVAL -1 DAY), 'Нормально.');

INSERT INTO reposts (user_id, post_id, creation_date)
VALUES (1, 3, DATE_ADD(NOW(), INTERVAL -5 HOUR)),
       (2, 1, DATE_ADD(NOW(), INTERVAL -3 HOUR)),
       (3, 1, DATE_ADD(NOW(), INTERVAL -3 HOUR));