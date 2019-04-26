USE readme;

# Чистка таблиц
SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE TABLE likes;
TRUNCATE TABLE comments;
TRUNCATE TABLE reposts;

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
VALUES (1, 'Василий Пупкин', 'vasya@pup.ru', '$2y$10$0GYFabnO4kWUhOhvSaOQGOsT3zHGyQBsSuRcgbtlUIV19u84TEEgW',
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
VALUES (4, 1, DATE_ADD(NOW(), INTERVAL -3 DAY), 'Цитата', '#актуально'),
       (4, 4, DATE_ADD(NOW(), INTERVAL -2 DAY), 'Цитата дня', '#актуально #толькодля'),
       (3, 1, DATE_ADD(NOW(), INTERVAL -1 DAY), 'Цветовая дифференциация штанов', '#актуально'),
       (1, 2, DATE_ADD(NOW(), INTERVAL -4 DAY), 'Когда у общества нет цветовой дифференциации штанов, то нет цели!',  '#новаяреальность'),
       (5, 3, DATE_ADD(NOW(), INTERVAL -5 DAY), 'Здесь научат :-)', '#обучение');


# Добавление контента
INSERT INTO quotes (post_id, text, author)VALUES
       (2, 'Если есть на этом Плюке гравицапа, так достанем. Не такое доставали…', 'Кин-дза-дза'),
       (1, 'Скрипач! Клептоманчик ты мой! Ты же гравицапу свистнул!', 'Кин-дза-дза');

INSERT INTO texts (post_id, text)
VALUES (3,
        'Если у меня немножко КЦ есть, я имею право носить жёлтые штаны... Если у меня много КЦ есть, я имею право носить малиновые штаны... Клади КЦ — получишь гравицапу.');

INSERT INTO photos (post_id, filename, original_filename)
VALUES (4, 'img/kc.jpg', 'kc.jpg');

INSERT INTO links (post_id, reference, description)
VALUES (5, 'https://htmlacademy.ru', 'Будет весело!');

INSERT INTO banners (text, creation_date, reference, description)
VALUES ('Еще больше цитат из к/ф "Кин-дза-дза" - здесь!', DATE_ADD(NOW(), INTERVAL -3 DAY), 'https://ru.wikiquote.org/wiki/%D0%9A%D0%B8%D0%BD-%D0%B4%D0%B7%D0%B0-%D0%B4%D0%B7%D0%B0!', 'Перейти'),
       ('Скрипач! Тут инопланетяне штанами фарцуют… жёлтыми… Нужны тебе?', DATE_ADD(NOW(), INTERVAL -2 DAY), 'https://github.com/htmlacademy-php', 'Перейти'),
       ('Здесь могла быть ваша реклама', DATE_ADD(NOW(), INTERVAL -3 WEEK), '#', 'Разместить');

INSERT INTO subscriptions (subscriber_id, blogger_id, creation_date)
VALUES (1, 2, DATE_ADD(NOW(), INTERVAL -3 DAY)),
       (3, 2, DATE_ADD(NOW(), INTERVAL -2 DAY)),
       (3, 1, DATE_ADD(NOW(), INTERVAL -4 DAY));

INSERT INTO messages (from_id, to_id, creation_date, text, was_read)
VALUES (1, 2, DATE_ADD(NOW(), INTERVAL -3 DAY), 'Как поездка?', 0),
       (3, 2, DATE_ADD(NOW(), INTERVAL -2 DAY), '"Ты жива еще, моя старушка...?"', 0),
       (3, 1, DATE_ADD(NOW(), INTERVAL -4 DAY), 'Посмотрел последние фото - они супер!', 1);

INSERT INTO likes (user_id, post_id, creation_date)
VALUES (4, 1, DATE_ADD(NOW(), INTERVAL -1 DAY)),
       (2, 3, DATE_ADD(NOW(), INTERVAL -1 DAY)),
       (4, 3, DATE_ADD(NOW(), INTERVAL -1 DAY)),
       (1, 5, DATE_ADD(NOW(), INTERVAL -2 DAY));

INSERT INTO comments (user_id, post_id, creation_date, text)
VALUES (1, 5, DATE_ADD(NOW(), INTERVAL -1 DAY), 'Это здорово!'),
       (2, 5, DATE_ADD(NOW(), INTERVAL -1 DAY), 'Нормально.');

INSERT INTO reposts (user_id, post_id, creation_date)
VALUES (1, 4, DATE_ADD(NOW(), INTERVAL -5 HOUR)),
       (2, 1, DATE_ADD(NOW(), INTERVAL -3 HOUR)),
       (3, 1, DATE_ADD(NOW(), INTERVAL -3 HOUR));