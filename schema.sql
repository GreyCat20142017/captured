#Однозначно, такая схема - это перебор. Но застарелые предрассудки пока победили...
DROP DATABASE IF EXISTS captured;

CREATE DATABASE captured DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

USE captured;

CREATE TABLE categories (
  id           INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name         VARCHAR(20),
  content_type VARCHAR(20)
);

CREATE TABLE users (
  id                INT UNSIGNED     NOT NULL AUTO_INCREMENT PRIMARY KEY,
  registration_date TIMESTAMP        NOT NULL        DEFAULT CURRENT_TIMESTAMP,
  email             VARCHAR(128)     NOT NULL UNIQUE DEFAULT '',
  name              CHAR(30)         NOT NULL        DEFAULT '',
  user_password     VARCHAR(254)     NOT NULL        DEFAULT '',
  info              TEXT             NOT NULL,
  avatar            CHAR(32)         NOT NULL        DEFAULT '',
  use_mdb           TINYINT UNSIGNED NOT NULL        DEFAULT 1
);

CREATE TABLE posts (
  id            INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id       INT UNSIGNED NOT NULL DEFAULT 0,
  category_id   INT UNSIGNED NOT NULL DEFAULT 0,
  title         VARCHAR(128) NOT NULL DEFAULT '',
  hashtag       VARCHAR(255) NOT NULL DEFAULT '',
  creation_date TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE likes (
  id            INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id       INT UNSIGNED NOT NULL DEFAULT 0,
  post_id       INT UNSIGNED NOT NULL DEFAULT 0,
  creation_date TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE comments (
  id            INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id       INT UNSIGNED NOT NULL DEFAULT 0,
  post_id       INT UNSIGNED NOT NULL DEFAULT 0,
  creation_date TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  text          VARCHAR(255) NOT NULL DEFAULT ''
);

CREATE TABLE reposts (
  id            INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  post_id       INT UNSIGNED NOT NULL DEFAULT 0,
  user_id       INT UNSIGNED NOT NULL DEFAULT 0,
  creation_date TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reviews (
  id            INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  post_id       INT UNSIGNED NOT NULL DEFAULT 0,
  user_id       INT UNSIGNED NOT NULL DEFAULT 0,
  counter       INT UNSIGNED NOT NULL DEFAULT 0,
  creation_date TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE photos (
  id                INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  post_id           INT UNSIGNED NOT NULL DEFAULT 0,
  filename          VARCHAR(32)  NOT NULL DEFAULT '',
  original_filename VARCHAR(32)  NOT NULL DEFAULT ''
);

CREATE TABLE videos (
  id                INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  post_id           INT UNSIGNED NOT NULL DEFAULT 0,
  youtube_id        CHAR(11)  NOT NULL DEFAULT ''
);

CREATE TABLE links (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  post_id     INT UNSIGNED NOT NULL DEFAULT 0,
  reference   VARCHAR(255) NOT NULL DEFAULT '',
  description VARCHAR(255)
);

CREATE TABLE texts (
  id      INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  post_id INT UNSIGNED NOT NULL DEFAULT 0,
  text    TEXT         NOT NULL
);

CREATE TABLE quotes (
  id      INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  post_id INT UNSIGNED NOT NULL DEFAULT 0,
  text    TEXT         NOT NULL,
  author  VARCHAR(32)
);

CREATE TABLE messages (
  id            INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  from_id       INT UNSIGNED NOT NULL DEFAULT 0,
  to_id         INT UNSIGNED NOT NULL DEFAULT 0,
  creation_date TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  text          TEXT         NOT NULL,
  was_read      TINYINT      NOT NULL DEFAULT 0
);


CREATE TABLE subscriptions (
  id            INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  subscriber_id INT UNSIGNED NOT NULL DEFAULT 0,
  blogger_id    INT UNSIGNED NOT NULL DEFAULT 0,
  creation_date TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE banners (
  id            INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  text          VARCHAR(255),
  creation_date TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  reference     VARCHAR(255),
  description   VARCHAR(32)
);

CREATE INDEX user_category_post ON posts (user_id, category_id, id);
CREATE UNIQUE INDEX subscriber_blogger ON subscriptions (subscriber_id, blogger_id);
CREATE UNIQUE INDEX re_post_user ON reposts (post_id, user_id);
CREATE FULLTEXT INDEX post_ft_search ON posts (title, hashtag);

CREATE INDEX from_to ON messages (from_id, to_id);

ALTER TABLE likes
  ADD CONSTRAINT fk_post_likes FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE;
ALTER TABLE likes
  ADD CONSTRAINT fk_user_likes FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE;

ALTER TABLE comments
  ADD CONSTRAINT fk_post_comments FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE;
ALTER TABLE comments
  ADD CONSTRAINT fk_user_comments FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE;

ALTER TABLE photos
  ADD CONSTRAINT fk_post_photos FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE;
ALTER TABLE videos
  ADD CONSTRAINT fk_post_videos FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE;
ALTER TABLE links
  ADD CONSTRAINT fk_post_links FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE;
ALTER TABLE quotes
  ADD CONSTRAINT fk_post_quotes FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE;
ALTER TABLE texts
  ADD CONSTRAINT fk_post_texts FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE;

ALTER TABLE subscriptions
  ADD CONSTRAINT fk_user_subscriber FOREIGN KEY (subscriber_id) REFERENCES users (id) ON DELETE CASCADE;
ALTER TABLE subscriptions
  ADD CONSTRAINT fk_user_blogger FOREIGN KEY (blogger_id) REFERENCES users (id) ON DELETE CASCADE;

ALTER TABLE reposts
  ADD CONSTRAINT fk_user_reposts FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE;
ALTER TABLE reposts
  ADD CONSTRAINT fk_post_reposts FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE;

ALTER TABLE reviews
  ADD CONSTRAINT fk_user_reviews FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE;
ALTER TABLE reviews
  ADD CONSTRAINT fk_post_reviews FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE;

ALTER TABLE messages
  ADD CONSTRAINT fk_user_msgs_from FOREIGN KEY (from_id) REFERENCES users (id) ON DELETE CASCADE;
ALTER TABLE messages
  ADD CONSTRAINT fk_user_msgs_to FOREIGN KEY (to_id) REFERENCES users (id) ON DELETE CASCADE;

ALTER TABLE posts
  ADD CONSTRAINT fk_user_posts FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE;
ALTER TABLE posts
  ADD CONSTRAINT fk_category_posts FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE;

