<?php
$arr = array_map('trim', explode(' ', fgets(STDIN)));

$numbers = [];
foreach ($arr as $num) {
    if (!array_key_exists($num, $numbers)) {
        $numbers[$num] = 0;
    }

    $numbers[$num]++;
}

$best = -1;
$num = null;
foreach ($numbers as $number => $count) {
    if ($count > $best) {
        $best = $count;
        $num = $number;
    }
}

echo $num;