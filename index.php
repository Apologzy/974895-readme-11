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

date_default_timezone_get("Europe/Moskow");
$xxx_sss = xss_content($popularPost);
$dt_now = date_create('now');

foreach ($xxx_sss as $key => &$post) {
    $dt_random = generate_random_date($key);
    $post['date_russian'] = date('d.m.Y H:i', strtotime($dt_random));
    $post['date_original'] = $dt_random;
    $dt_diff = date_diff($dt_now, date_create($dt_random));
    $post['date_rel'] = get_post_time($dt_diff);
};

function get_post_time ($time) {
    $month_con = date_interval_format($time, '%m');
    $day_con = date_interval_format($time, '%a');
    $hours_con = date_interval_format($time, '%h');
    $min_con = date_interval_format($time, '%i');
    if ($month_con >= 1) {
        return get_noun_plural_form($month_con, 'месяц', 'месяца', 'месяцев') . ' назад';
    } else if ($day_con >= 7) {
        $week_con = floor($day_con / 7);
        return get_noun_plural_form($week_con, 'неделя', 'недели', 'недель') . ' назад';
    } else if ($day_con < 0 and $day_con < 7 ) {
        return get_noun_plural_form($day_con, 'день', 'дня', 'дней') . ' назад';
    } else if ($hours_con >= 1) {
        return get_noun_plural_form($hours_con, 'час', 'часа', 'часов'). ' назад';
    } else {
        return get_noun_plural_form($min_con, 'минута', 'минуты', 'минут') . ' назад';
    }
};

function get_noun_plural_form(int $number, string $one, string $two, string $many): string
{
    $number = (int)$number;
    $mod10 = $number % 10;
    $mod100 = $number % 100;
    switch (true) {
        case ($mod100 >= 11 && $mod100 <= 20):
            return $number. $many;

        case ($mod10 > 5):
            return $number . $many;

        case ($mod10 === 1):
            return $number . $one;

        case ($mod10 >= 2 && $mod10 <= 4):
            return $number . $two;

        default:
            return $number . $many;
    }

};



function generate_random_date($index)
{
    $deltas = [['minutes' => 59], ['hours' => 23], ['days' => 6], ['weeks' => 4], ['months' => 11]];
    $dcnt = count($deltas);

    if ($index < 0) {
        $index = 0;
    }

    if ($index >= $dcnt) {
        $index = $dcnt - 1;
    }

    $delta = $deltas[$index];
    $timeval = rand(1, current($delta));
    $timename = key($delta);

    $ts = strtotime("$timeval $timename ago");
    $dt = date('Y-m-d H:i:s', $ts);

    return $dt;
};

function getContent($text, $max_length) {

    $str_length = mb_strlen($text);
    if ($str_length > $max_length) {
        $words = explode(' ', $text);
        $new_words = [];
        $divide = '...';

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
        $x_cont['title'] = strip_tags($x_cont['title']);
        $x_cont['tip'] = strip_tags($x_cont['tip']);
        $x_cont['content'] = strip_tags($x_cont['content']);
        $x_cont['userName'] = strip_tags($x_cont['userName']);
        $x_cont['avatar'] = strip_tags($x_cont['avatar']);
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







$page_content = include_template ('main.php', ['popularPost' => $popularPost, 'xxx_sss' => $xxx_sss]);
$layout_content = include_template ('layout.php',['pop_content' => $page_content, 'title' => 'Readme: популярное', 'is_auth' => $is_auth]);
print ($layout_content);
?>
