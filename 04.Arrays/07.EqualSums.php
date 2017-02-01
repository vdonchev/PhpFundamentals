<?php
$arr = explode(' ', fgets(STDIN));

$match = false;
for ($i = 0; $i < count($arr); $i++) {
    $leftSum = array_sum(array_slice($arr, 0, $i));
    $rightSum = array_sum(array_slice($arr, $i + 1, count($arr) - ($i + 1)));

    if ($leftSum == $rightSum) {
        echo $i;
        $match = true;
    }
}

if (!$match) {
    echo 'no';
}