<?php
/**
 * Works with negative numbers too
 */

$numbers = [];
while (true) {
    $line = trim(fgets(STDIN));
    if (empty($line))
        break;

    if (is_numeric($line))
        array_push($numbers, intval($line));
}

echo max($numbers);