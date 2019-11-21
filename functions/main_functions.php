<?php

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
            return $number . ' ' . $many;

        case ($mod10 > 5):
            return $number . ' ' . $many;

        case ($mod10 === 1):
            return $number . ' '  . $one;

        case ($mod10 >= 2 && $mod10 <= 4):
            return $number . ' '  . $two;

        default:
            return $number . ' '  . $many;
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


function posts_filtered ($content) {
    foreach ($content as $key => & $x_cont) {
        $x_cont['title'] = strip_tags($x_cont['title']);
        $x_cont['login'] = strip_tags($x_cont['login']);
        $x_cont['content'] = strip_tags($x_cont['content']);
        $x_cont['login'] = strip_tags($x_cont['login']);
        $x_cont['avatar'] = strip_tags($x_cont['avatar']);
        $x_cont['autor'] = strip_tags($x_cont['autor']);
        $x_cont['img'] = strip_tags($x_cont['img']);
        $x_cont['link'] = strip_tags($x_cont['link']);
        $x_cont['video'] = strip_tags($x_cont['video']);
        $x_cont['avatar'] = strip_tags($x_cont['avatar']);
    };
    return $content;
};


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

// валидация по полю емейл
function validateEmail($name) {
    if (!filter_input(INPUT_POST, $name, FILTER_VALIDATE_EMAIL)) {
        return "Введите корректный email";
    }
};


// проверка заполненности поля
function validateFilled($name) {
    if (empty($_POST[$name])) {
        return "Это поле должно быть заполнено";
    }
};

// проверка длины поля
function isCorrectLength($name, $min, $max) {
    $len = strlen($_POST[$name]);
    if ($len < $min or $len > $max) {
        return "Значение должно быть от $min до $max символов";
    }
};

?>

