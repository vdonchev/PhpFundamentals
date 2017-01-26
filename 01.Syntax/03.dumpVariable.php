<?php
$var = 1.234;
solve($var);

$var = array(1, 2, 3);
solve($var);

function solve($var)
{
    if (is_numeric($var)) {
        var_dump($var);
    } else {
        echo gettype($var);
    }
}