<?php
$is_auth = 1;

$image_types = ['image/jpeg', '	image/svg+xml', 'image/x-icon', 'image/bmp'];

$con = mysqli_connect('127.0.0.1', 'root', '', 'readme');
if ($con == false) {
    exit('Ошибка подключения ' . mysqli_connect_error());
};

require ('functions/sql_functions.php');
require ('functions/main_functions.php');

$content_id = $_GET['content_id'] ?? null;
$post_content_id = $_GET['content_id'] ?? null;
$post_cards = get_post_assoc($con, $content_id);

$sql_con_types = 'SELECT * FROM content_types';
$cont_result = mysqli_query($con, $sql_con_types);
if (!$cont_result) {
    $error = mysqli_error($con);
    exit('Ошибка mySQL: ' . $error);
}
else {
    $content_types = mysqli_fetch_all($cont_result, MYSQLI_ASSOC);
};


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form_content = $_POST;
    $req_fields = [];
    if (isset($_POST['post-text'])) {
        $add_main = include_template('val_form/text-val.php',['form_content ' => $form_content,
        'con' => $con, 'content_types' => $content_types, 'content_id' => $content_id, 'post_cards' => $post_cards,
        'is_auth' => $is_auth]);
    };
    if (isset($form_content['post-photo'])) {
        $req_fields = ['photo-heading'];
    };
    if (isset($form_content['post-quote'])) {
        $req_fields = ['quote-heading', 'quote-content', 'quote-author'];
    };

} else {
    $add_main = include_template ('add_main.php', ['con' => $con, 'content_types' => $content_types, 'content_id' => $content_id, 'post_cards' => $post_cards]);
};


$add_layout = include_template ('layout.php',['pop_content' => $add_main, 'title' => 'readme: добавление публикации', 'is_auth' => $is_auth]);
print ($add_layout);


?>
