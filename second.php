<?php
header("Content-Type: text/plain");

// Задачи на preg_match[_all]

$str = 'mymail@mail.ru';
preg_match('/^\w+@\w+\.\w+/', $str, $out);
if (!empty($out)) {
    echo 'email валидный' . PHP_EOL;
} else {
    echo 'email не валидный' . PHP_EOL;
}

echo PHP_EOL;

$str = 'mymail@mail.ru my.mail@mail.ru my-mail@mail.ru my_mail@mail.ru mail@mail.com mail@mail.by mail@yandex.ru';
$array = explode(' ', $str);
preg_match_all('/\w+@\w+\.\w+/', $str, $out);
foreach ($array as $key => $value) {
    foreach ($out[0] as $item) {
        if ($value != $item) {
            continue;
        } else {
            echo "$value - ликвидный email" . PHP_EOL;
            unset($array[$key]);
            break;
        }
    }
    if (isset($array[$key])) {
        echo "$value - не ликвидный email" . PHP_EOL;
    }
}

echo PHP_EOL;

$str = 'my-site123.com';
preg_match('/^[\w-]+\.[a-z]{2,6}$/', $str, $out);
if (!empty($out)) {
    echo 'домен валидный' . PHP_EOL;
} else {
    echo 'домен не валидный' . PHP_EOL;
}

$str = 'http://site.ru';
preg_match('/^http:\/\/[\w-]+\.[a-z]{2,6}$/', $str, $out);
if (!empty($out)) {
    echo 'домен валидный' . PHP_EOL;
} else {
    echo 'домен не валидный' . PHP_EOL;
}

$str = 'https://site.ru';
preg_match('/^http(|s):\/\/[\w-]+\.[a-z]{2,6}$/', $str, $out);
if (!empty($out)) {
    echo 'домен валидный' . PHP_EOL;
} else {
    echo 'домен не валидный' . PHP_EOL;
}

$str = 'http://site.ru';
preg_match('/^http(|s):\/\/[\w-]+\.[a-z]{2,6}(|\/)$/', $str, $out);
if (!empty($out)) {
    echo 'домен валидный' . PHP_EOL;
} else {
    echo 'домен не валидный' . PHP_EOL;
}

$str = 'https://site.ru';
preg_match('/^https?/', $str, $out);
if (!empty($out)) {
    echo 'начинается' . PHP_EOL;
} else {
    echo 'не начинается' . PHP_EOL;
}

$str = 'file.php';
preg_match('/\.(txt|html|php)$/', $str, $out);
if (!empty($out)) {
    echo 'заканчивается' . PHP_EOL;
} else {
    echo 'не заканчивается' . PHP_EOL;
}

$str = 'image.jpg';
preg_match('/\.(jpe?g)$/', $str, $out);
if (!empty($out)) {
    echo 'заканчивается' . PHP_EOL;
} else {
    echo 'не заканчивается' . PHP_EOL;
}

$str = '12 dg72H _-_42j6 8';
preg_match_all('/\d/', $str, $out);
$result = array_sum($out[0]);
var_dump($result);
// Задачи на preg_match[_all]

// Задачи на preg_replace

$str = '31-12-2014';
$str = preg_replace('/-/', '.', $str);
var_dump($str);

$str = 'http://site.ru';
$str = preg_replace('/^http(|s):\/\/[\w]+\.[\w]+/', '<a href="$0">$0</a>', $str);
var_dump($str);

// Задачи на preg_replace

// На preg_replace_callback

$str = '1234';

function foo(array $arr):string {
    foreach ($arr as &$value) {
        $value = pow($value, 2);
    }
    $result = implode($arr);
    return $result;
}

$str = preg_replace_callback('/\d/', 'foo', $str);
var_dump($str);

$str = "2aaa'3'bbb'4'";

function bar(array $arr):string {
    foreach ($arr as &$value) {
        $value = pow(trim($value, "'"), 2);
        $value = "'" . $value . "'";
    }
    $result = implode($arr);
    return $result;
}

$str = preg_replace_callback("/'\d'/", 'bar', $str);
var_dump($str);

// На preg_replace_callback