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

function get_post_assoc($conect, $get_id) {
    if ($conect == false) {
        exit('Ошибка подключения ' . mysqli_connect_error());
    }
    else {
        mysqli_set_charset($conect, 'utf8');
        $sql_post_id = 'SELECT * FROM posts p '
            . 'JOIN users u ON p.user_id = u.id '
            . 'JOIN content_types t ON p.content_id = t.id '
            . "WHERE p.content_id = $get_id";
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







$page_content = include_template ('main.php', ['pop_post' => $pop_post, 'cleaned_post' => $cleaned_post, 'content_types' => $content_types, 'con' => $con]);
$layout_content = include_template ('layout.php',['pop_content' => $page_content, 'title' => 'Readme: популярное', 'is_auth' => $is_auth]);
print ($layout_content);
?>
