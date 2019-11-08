CREATE DATABASE IF NOT EXISTS readme
DEFAULT CHARACTER SET UTF8
DEFAULT COLLATE UTF8_GENERAL_CI;
USE readme;

CREATE TABLE IF NOT EXISTS users  (
id INT AUTO_INCREMENT PRIMARY KEY,
dt_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
email VARCHAR(150)  NOT NULL  UNIQUE,
login VARCHAR(50)  NOT NULL  UNIQUE,
pass VARCHAR(12)  NOT NULL,
avatar VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS posts (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
content_id INT,
dt_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
title VARCHAR(150),
content TEXT,
autor VARCHAR(100),
img VARCHAR(255),
video VARCHAR(255),
link VARCHAR(255),
num_of_views INT
);


CREATE TABLE IF NOT EXISTS comments  (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
post_id INT,
dt_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
content TEXT
);

CREATE TABLE IF NOT EXISTS likes  (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
post_id INT
);

CREATE TABLE IF NOT EXISTS subscriptions  (
id INT AUTO_INCREMENT PRIMARY KEY,
creator_id INT,
subscriber_id INT
);

CREATE TABLE IF NOT EXISTS  messages  (
id INT AUTO_INCREMENT PRIMARY KEY,
sender_id INT,
recipient_id INT,
dt_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
content TEXT
);

CREATE TABLE IF NOT EXISTS hashtags  (
id INT AUTO_INCREMENT PRIMARY KEY,
h_name VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS posts_hashtags  (
id INT AUTO_INCREMENT PRIMARY KEY,
post_id INT,
hastag_id INT
);

CREATE TABLE IF NOT EXISTS content_types  (
id INT AUTO_INCREMENT PRIMARY KEY,
field_name ENUM ("Текст", "Цитата", "Картинка", "Видео", "Ссылка"),
icon_class ENUM ("photo", "video", "text", "quote", "link")
);