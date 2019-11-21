<?php
$is_auth = 1;
require ('functions/main_functions.php');
$add_main = include_template ('add_main.php', []);
$add_layout = include_template ('layout.php',['pop_content' => $add_main, 'title' => 'readme: добавление публикации', 'is_auth' => $is_auth]);
print ($add_layout);

?>
