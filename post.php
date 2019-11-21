<?php

$is_auth = 1;
require ('functions/main_functions.php');

$post_id = $_GET['post_id'] ?? null;

$con = mysqli_connect('127.0.0.1', 'root', '', 'readme');
if ($con == false) {
    exit('Ошибка подключения ' . mysqli_connect_error());
}
else {
    mysqli_set_charset($con, 'utf8');
    $sql_post_id = 'SELECT * FROM posts p '
        . 'JOIN users u ON p.user_id = u.id '
        . 'JOIN content_types t ON p.content_id = t.id '
        . "WHERE p.id = $post_id";
    $posts_result_id = mysqli_query($con, $sql_post_id);
    if (!$posts_result_id) {
        $error = mysqli_error($con);
        exit('Ошибка mySQL: ' . $error);
    }
    else {
        $post_cards = mysqli_fetch_all($posts_result_id, MYSQLI_ASSOC);
        if (!$post_cards) {
            http_response_code(404);
            die('Страница не найдена');
        }
        //var_dump($post_card);
        //var_dump($post_id);

    }

};


$post_main = include_template ('post_main.php', ['post_id' => $post_id, 'post_cards' => $post_cards]);
$open_card_layout = include_template ('layout.php',['pop_content' => $post_main, 'title' => 'readme: публикация', 'is_auth' => $is_auth]);
print ($open_card_layout);


?>


