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
VALUES (1, 'Василий Пупкин', 'vasya@mail.ru', '$2y$10$0GYFabnO4kWUhOhvSaOQGOsT3zHGyQBsSuRcgbtlUIV19u84TEEgW', 'ava_1.svg',
        DATE_ADD(NOW(), INTERVAL -2 MONTH), 'Любитель гор'),
       (2, 'Василиса Пупкина', 'zz@zz.zz', '$2y$10$0GYFabnO4kWUhOhvSaOQGOsT3zHGyQBsSuRcgbtlUIV19u84TEEgW',
        'ava_2.svg',  DATE_ADD(NOW(), INTERVAL -3 WEEK), 'Котики - наше все!'),
       (3, 'Кукушкин К.К', 'qq@qq.qq', '$2y$10$zu1owVM2wNw9m/QsBTO45OcEosAdtV1tv4cK3GSrL.RBBWch639XG',
        'ava_3.svg',
        DATE_ADD(NOW(), INTERVAL -2 WEEK),'Любитель птиц');

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

INSERT INTO banners (text, creation_date, reference, reference_text)
VALUES ('Все в Laravel!',  DATE_ADD(NOW(), INTERVAL -3 DAY), 'https://laravel.com/docs/5.8', 'Перейти'),
('Здесь могла быть ваша реклама', DATE_ADD(NOW(), INTERVAL -3 WEEK), '#', 'Разместить');

INSERT INTO subscriptions (subscriber_id, blogger_id, creation_date)
VALUES (1, 2, DATE_ADD(NOW(), INTERVAL -3 DAY)),
       (3, 2, DATE_ADD(NOW(), INTERVAL -2 DAY)),
       (3, 1, DATE_ADD(NOW(), INTERVAL -4 DAY));

INSERT INTO messages (from_id, to_id, creation_date, text)
VALUES (1, 2, DATE_ADD(NOW(), INTERVAL -3 DAY), 'Как поездка?'),
       (3, 2, DATE_ADD(NOW(), INTERVAL -2 DAY), '"Ты жива еще, моя старушка...?"'),
       (3, 1, DATE_ADD(NOW(), INTERVAL -4 DAY), 'Посмотрел последние фото - они супер!');
SET FOREIGN_KEY_CHECKS = 1;