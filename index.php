<?php
$is_auth = 1;
$user_name = 'Кирилл'; // укажите здесь ваше имя
$popularPost = [
    [
        'title' => 'Цитата',
        'tip' => 'post-quote',
        'content' => '<div> Мы в жизни любим только раз, а после ищем лишь похожих',
        'userName' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg'
    ],
    [
        'title' => 'Игра Престолов',
        'tip' => 'post-text',
        'content' => '<div> <div> <div> <div>Lorem ipsum dolor sit ametttttrrrt, consectetuer adipisciererrreng elit. Aenean commodo ligula eget dolorr. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula',
        'userName' => 'Владик',
        'avatar' => 'userpic.jpg'
    ],
    [
        'title' => '<div> <div> <div> <div>Наконец, обработал фотки!',
        'tip' => 'post-photo',
        'content' => 'rock-medium.jpg',
        'userName' => 'Виктор',
        'avatar' => 'userpic-mark.jpg'
    ],
    [
        'title' => 'Моя мечта',
        'tip' => 'post-photo',
        'content' => 'coast-medium.jpg',
        'userName' => 'Лариса',
        'avatar' => 'userpic-larisa-small.jpg'
    ],
    [
        'title' => 'Лучшие курсы',
        'tip' => 'post-link',
        'content' => 'www.htmlacademy.ru',
        'userName' => '	Владик',
        'avatar' => 'userpic.jpg'
    ]
];
 function getContent($text, $max_length) {
    $str_length = mb_strlen($text);
    if ($str_length > $max_length) {
        $words = explode(' ', $text);
        $new_words = [];
        $divide = '...';
        $xss_str ='';
        foreach ($words as $word) {
            $new_words[] = $word;
            $new_str_lng = mb_strlen(implode(' ', $new_words));

            if ($new_str_lng > $max_length) {
                array_pop($new_words);

                return implode(' ', $new_words).$divide;
            } elseif ($new_str_lng == $max_length) {
                return implode(' ', $new_words).$divide;
            };
        };
    }
    else {
        return $text;
    }
};

function xss_content ($content) {
    foreach ($content as $key => & $x_cont) {
        $x_cont['title'] = htmlspecialchars($x_cont['title']);
        $x_cont['tip'] = htmlspecialchars($x_cont['tip']);
        $x_cont['content'] = htmlspecialchars($x_cont['content']);
        $x_cont['userName'] = htmlspecialchars($x_cont['userName']);
        $x_cont['avatar'] = htmlspecialchars($x_cont['avatar']);
    };
    return $content;
}

function include_template ($name, $data) {
    $name = 'templates/' . $name;
    $result = '';
    if (!file_exists($name)) {
        return $result;
    }
    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();
    return $result;
};

$page_content = include_template ('main.php', ['popularPost' => $popularPost]);
$layout_content = include_template ('layout.php',['pop_content' => $page_content, 'title' => 'Readme: популярное', 'is_auth' => $is_auth]);
print ($layout_content);
?>


