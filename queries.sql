
INSERT INTO users (email, login, pass, avatar) VALUES
('larisa01@mail.ru', 'Larisa', 123, 'userpic-larisa-small.jpg'),
('Vladik02@mail.ru', 'Vladik', 1234, 'userpic.jpg'),
('Viktor03@mail.ru', 'Viktor', 12345, 'userpic-mark.jpg');


INSERT INTO posts
set title = 'Цитата',
content = 'Мы в жизни любим только раз, а после ищем лишь похожих',
autor = 'Лариса',
num_of_views = 10,
user_id = 1,
content_id = 3;

INSERT INTO posts
set title = 'Игра Престолов',
content = 'Lorem ipsum dolor sit ametttttrrrt, consectetuer adipisciererrreng elit',
num_of_views = 55,
user_id = 2,
content_id = 1;

INSERT INTO posts
set title = 'Наконец, обработал фотки!',
img = 'rock-medium.jpg',
num_of_views = 130,
user_id = 3,
content_id = 2;

INSERT INTO posts
set title = 'Моя мечта',
img = 'coast-medium.jpg',
num_of_views = 145,
user_id = 1,
content_id = 2;

INSERT INTO posts
set title = 'Лучшие курсы',
link = 'www.htmlacademy.ru',
num_of_views = 500,
user_id = 2,
content_id = 5;

INSERT INTO comments
set content = 'Крутое фото чувак';
user_id = 1,
post_id = 3;

INSERT INTO comments
set content = 'Отличная цитата';
user_id = 2,
post_id = 1;

INSERT INTO content_types (field_name, icon_class) VALUES
(Текст, text),
(Картинка, photo),
(Цитата, quote),
(Видео, video),
(Ссылка, link);


