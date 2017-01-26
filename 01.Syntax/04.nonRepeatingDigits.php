<?php
$num = 145;

$res = [];
for ($i = 102; $i <= $num; $i++) {
    if (isDistinct($i)) {
        array_push($res, $i);
    }
}

if (sizeof($res) === 0) {
    echo 'no';
} else {
    echo implode(', ', $res);
}

function isDistinct($num)
{
    $num = '' . $num;
    $current = [];
    for ($i = 0; $i < strlen($num); $i++) {
        $currentNum = $num[$i];
        if (in_array($currentNum, $current)) {
            return false;
        }

        array_push($current, $currentNum);
    }

    return true;
}