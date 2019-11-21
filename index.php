<?php
$is_auth = 1;
$user_name = 'Кирилл'; // укажите здесь ваше имя


$con = mysqli_connect('127.0.0.1', 'root', '', 'readme');
if ($con == false) {
    exit('Ошибка подключения ' . mysqli_connect_error());
}
else {
    mysqli_set_charset($con, 'utf8');
    $sql_posts = 'SELECT p.id, p.user_id, p.content_id, u.login, u.avatar, t.field_name, t.icon_class, p.dt_create, title, content, autor, img, video, link, num_of_views FROM posts p '
    . 'JOIN users u ON p.user_id = u.id '
    . 'JOIN content_types t ON p.content_id = t.id '
    . 'ORDER BY num_of_views DESC';
    $posts_result = mysqli_query($con, $sql_posts);
    if (!$posts_result) {
        $error = mysqli_error($con);
        exit('Ошибка mySQL: ' . $error);
    }
    else {
        $pop_post = mysqli_fetch_all($posts_result, MYSQLI_ASSOC);
    }

};

require ('functions/sql_functions.php');

require ('functions/main_functions.php');



$post_content_id = $_GET['content_id'] ?? null;
$post_cards = get_post_assoc($con, $post_content_id);


$sql_con_types = 'SELECT * FROM content_types';
$cont_result = mysqli_query($con, $sql_con_types);
if (!$cont_result) {
    $error = mysqli_error($con);
    exit('Ошибка mySQL: ' . $error);
}
else {
    $content_types = mysqli_fetch_all($cont_result, MYSQLI_ASSOC);
};


date_default_timezone_get("Europe/Moskow");
$cleaned_post = posts_filtered($pop_post);
$dt_now = date_create('now');

foreach ($cleaned_post as $key => &$post) {
    $dt_random = generate_random_date($key);
    $post['date_russian'] = date('d.m.Y H:i', strtotime($dt_random));
    $post['date_original'] = $dt_random;
    $dt_diff = date_diff($dt_now, date_create($dt_random));
    $post['date_rel'] = get_post_time($dt_diff);
};




$page_content = include_template ('main.php', ['pop_post' => $pop_post, 'post_content_id' => $post_content_id , 'post_cards' => $post_cards, 'cleaned_post' => $cleaned_post, 'content_types' => $content_types, 'con' => $con]);
$layout_content = include_template ('layout.php',['pop_content' => $page_content, 'title' => 'Readme: популярное', 'is_auth' => $is_auth]);
print ($layout_content);
?>
