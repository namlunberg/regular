<?php
header("Content-Type: text/plain");

$a = 0;
if ($a >= 0) {
    echo 'верно' . PHP_EOL;
} else {
    echo 'не верно' . PHP_EOL;
}

$str = '12345';
$a = mb_substr($str, 0, 1);
if ($a == '1' || $a == '2' || $a == '3') {
    echo 'да' . PHP_EOL;
} else {
    echo 'нет' . PHP_EOL;
}

for ($i = 1; $i <= 100; $i++) {
    echo $i . PHP_EOL;
}

$array = ['<b>php</b>', '<i>html</i>'];
foreach ($array as &$value) {
    $value = strip_tags($value);
}
var_dump($array);

$dirName = './dir';
$dirIn = scandir($dirName);
$result = array_diff($dirIn, ['.', ".."]);
foreach ($result as $item) {
    if (is_dir($dirName . '/' . $item)) {
        echo $item . PHP_EOL;
    }
}

$array = file('./test.txt');
$result = array_sum($array);
file_put_contents('./sum.txt', $result);
