<?php

function get_post_assoc($conect, $get_id) {
    if ($conect == false) {
        exit('Ошибка подключения ' . mysqli_connect_error());
    }
    else {
        $whereCondition = ($get_id ?  "WHERE p.content_id = $get_id" : '');

        $sql_post_id = <<<SQL
        SELECT p.id, p.user_id, p.content_id, u.login, u.avatar, t.field_name, t.icon_class, p.dt_create, title, content, autor, img, video, link, num_of_views FROM posts p
             JOIN users u ON p.user_id = u.id
             JOIN content_types t ON p.content_id = t.id
             $whereCondition
SQL;
        $posts_result_id = mysqli_query($conect, $sql_post_id);
        if (!$posts_result_id) {
            $error = mysqli_error($conect);
            exit('Ошибка mySQL: ' . $error);
        }
        else {
            return $post_card = mysqli_fetch_all($posts_result_id, MYSQLI_ASSOC);
            //var_dump($post_card);
            //var_dump($post_id);

        }

    };
};



?>
