<?php
$arr = preg_split('/\s+/', trim(fgets(STDIN)));
$sum = 0;
foreach ($arr as $item) {
    $sum += floatval(strrev(trim($item, '0')));
}

echo $sum;