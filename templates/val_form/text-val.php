<?php


$req_fields = ['text-heading', 'text-content'];
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

$form_con_arr = filter_input_array(INPUT_POST, ['text-heading' => FILTER_DEFAULT, 'post-tags' => FILTER_DEFAULT, 'text-content' => FILTER_DEFAULT], true);

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



if (count($errors)) {
    $add_main = include_template('add_main.php', ['con' => $con, 'content_types' => $content_types, 'content_id' => $content_id, 'post_cards' => $post_cards,
    'errors' => $errors, 'form_con_arr' => $form_con_arr]);
   // $add_layout = include_template ('layout.php',['pop_content' => $add_main, 'title' => 'readme: добавление публикации', 'is_auth' => $is_auth]);
   // exit($add_layout);
    header("Location: add.php?content_id=1");
} else {
    if (isset($form_con_arr['text-heading'])) {
        $text_title = $form_con_arr['text-heading'];
        $text_content = $form_con_arr['text-content'];
        $sql_add_post = <<<SQL
            INSERT INTO posts 
            set title = '$text_title',
            content = '$text_content',
            user_id = 1,
            content_id = 1;
SQL;
        $add_post_result = mysqli_query($con, $sql_add_post);
        if (!$add_post_result) {
            $error = mysqli_error($con);
            exit('Ошибка mySQL: ' . $error);


        } else {
            $add_post_id = mysqli_insert_id($con);

            header("Location: post.php?post_id=" . $add_post_id);
        };


    };
};



?>
