<?php
$arr = preg_split('/\s+/', trim(fgets(STDIN)));
$length = [];
$prev = [];

for ($i = 0; $i < count($arr); $i++) {
    $length[$i] = 1;
    $prev[$i] = -1;

    for ($j = 0; $j < $i; $j++) {
        if ($arr[$i] > $arr[$j]) {
            if ($length[$j] + 1 > $length[$i]) {
                $prev[$i] = $j;
                $length[$i] = $length[$j] + 1;
            }
        }
    }
}

$max = 0;
$index = -1;
for ($i = 0; $i < count($length); $i++) {
    if ($length[$i] > $max) {
        $max = $length[$i];
        $index = $i;
    }
}

$res = [];
while (true) {
    if ($index == -1) {
        break;
    }

    array_unshift($res, $arr[$index]);
    $index = $prev[$index];
}

echo implode(' ', $res);