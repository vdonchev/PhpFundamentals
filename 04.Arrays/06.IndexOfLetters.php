<?php
$str = strtolower(trim(fgets(STDIN)));
$output = '';
for ($i = 0; $i < strlen($str); $i++) {
    if (ctype_alpha($str[$i])) {
        $pos = letterPosition($str[$i]);
        $output .= "{$str[$i]} -> {$pos}\n";
    }
}

echo trim($output);

function letterPosition($letter)
{
    return ord($letter) - 97;
}