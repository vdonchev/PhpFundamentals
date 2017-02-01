<?php
$arr = preg_split('/\s+/', trim(fgets(STDIN)));
$rotations = intval(fgets(STDIN));
$sum = array_fill(0, count($arr), 0);

for ($i = 0; $i < $rotations; $i++) {
    rotateArr($arr);
    sumArrays($sum, $arr);
}

echo implode(' ', $sum);

function rotateArr(&$arr)
{
    $element = array_pop($arr);
    array_unshift($arr, $element);
}

function sumArrays(&$arrSum, $arr)
{
    for ($i = 0; $i < count($arrSum); $i++) {
        $arrSum[$i] = intval($arrSum[$i]) + intval($arr[$i]);
    }
}