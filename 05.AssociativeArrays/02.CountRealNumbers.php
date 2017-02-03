<?php
$numbers = explode(" ", trim(fgets(STDIN)));
$result = [];
foreach ($numbers as $number) {
    if (!array_key_exists($number, $result)) {
        $result[$number] = 0;
    }

    $result[$number]++;
}

ksort($result);
foreach ($result as $key => $val) {
    echo "{$key} -> {$val} times\n";
}