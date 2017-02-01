<?php
$arrA = array_filter(explode(' ', fgets(STDIN)));
$arrB = array_filter(explode(' ', fgets(STDIN)));

$best = 0;
$current = countCommon($arrA, $arrB);
$best = $current > $best ? $current : $best;
$arrA = array_reverse($arrA);
$arrB = array_reverse($arrB);
$current = countCommon($arrA, $arrB);
$best = $current > $best ? $current : $best;

echo $best;

function countCommon($arrA, $arrB)
{
    $length = min(count($arrA), count($arrB));
    $current = 0;
    for ($i = 0; $i < $length; $i++) {
        if ($arrA[$i] == $arrB[$i]) {
            $current++;
        } else {
            break; // return; return; :P
        }
    }

    return $current;
}