<?php
$is_auth = 1;

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
    $req_fields = ['text-heading', 'photo-heading', 'text-content', 'quote-heading', 'quote-content', 'quote-author', 'photo-url' ,
        'userpic-file-photo', 'link-heading', 'post-link', 'video-heading', 'video-url'];
    $rules = [
        'text-heading' => function($value) {
        return validateLength($value, 10, 200);
        },
        'photo-heading' => function($value) {
            return validateLength($value, 10, 200);
        },
        'quote-heading' => function($value) {
            return validateLength($value, 10, 200);
        },
        'link-heading' => function($value) {
            return validateLength($value, 10, 200);
        },
        'video-heading' => function($value) {
            return validateLength($value, 10, 200);
        },
        'text-content' => function($value) {
        return validateLength($value, 10, 3000);
        },
        'quote-heading' => function($value) {
            return validateLength($value, 10, 3000);
        },
        'quote-autor' => function($value) {
            return validateLength($value, 10, 100);
        },
        ];

    $form_con_arr = filter_input_array(INPUT_POST, ['text-heading' => FILTER_DEFAULT, 'photo-heading' => FILTER_DEFAULT,
    'text-content' => FILTER_DEFAULT, 'quote-heading' => FILTER_DEFAULT, 'quote-content' => FILTER_DEFAULT, 'quote-author' => FILTER_DEFAULT,
    'photo-url' => FILTER_DEFAULT, 'userpic-file-photo' => FILTER_DEFAULT,'link-heading' => FILTER_DEFAULT, 'post-link' => FILTER_DEFAULT,
    'video-heading' => FILTER_DEFAULT, 'video-url' => FILTER_DEFAULT], true);

    foreach ($form_con_arr as $key => $value) {
        if (isset($rules[$key])) {
            $rule = $rules[$key];
            $errors[$key] = $rule($value);
        }

        if (in_array($key, $req_fields) && empty($value)) {
            $errors[$key] = "Поле $key надо заполнить";
        }
    };
    $errors = array_filter($errors);

    if (!empty($_FILES['userpic-file-photo']['name'])) {
        $tmp_name = $_FILES['userpic-file-photo']['tmp_name'];
        $path = $_FILES['userpic-file-photo']['name'];
        $formats = explode ('.', $path);
        if (count($formats) >= 2) {
            $format = end($formats);
            $format = mb_strtolower($format);
        };
        $filename = uniqid() . '.' . $format;

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tmp_name);
        if ($file_type !== "image/gif") {
            $errors['file'] = 'Загрузите картинку в нужном формате';
        } else {
            move_uploaded_file($tmp_name, 'uploads/' . $filename);
            $form_con_arr['path'] = $filename;
        };

    } else {
        $errors['file'] = 'Вы не загрузили файл';
    };

};

$add_main = include_template ('add_main.php', ['con' => $con, 'content_types' => $content_types, 'content_id' => $content_id, 'post_cards' => $post_cards]);
$add_layout = include_template ('layout.php',['pop_content' => $add_main, 'title' => 'readme: добавление публикации', 'is_auth' => $is_auth]);
print ($add_layout);

?>
