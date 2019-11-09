
SELECT p.id, p.user_id, p.content_id, u.login, t.field_name, t.icon_class, p.dt_create, title, content, autor, img, video, link, num_of_views FROM posts p
JOIN users u ON p.user_id = u.id
JOIN content_types t ON p.content_id = t.id
ORDER BY num_of_views DESC;

SELECT p.id, p.user_id, p.dt_create, title, content, autor, img, video, link, num_of_views FROM posts p
JOIN users u ON p.user_id = u.id
WHERE login = 'Larisa';


SELECT p.id, u.login, c.dt_create AS comm_dt_create, title, c.content AS comment FROM posts p
JOIN users u ON p.user_id = u.id
JOIN comments c ON c.post_id = p.id
WHERE p.title = 'Цитата';

INSERT INTO likes
set user_id = 1,
post_id = 2;

Insert INTO subscriptions
set creator_id = 1,
subscriber_id = 2;
