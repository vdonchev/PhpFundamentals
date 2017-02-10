<?php
$num = floatval(trim(fgets(STDIN)));
$operations = explode(", ", trim(fgets(STDIN)));
$functions = ["chop" => "chopNum", "dice" => "dice", "spice" => "spice", "bake" => "bake", "fillet" => "fillet"];
foreach ($operations as $operation) {
    if (array_key_exists($operation, $functions)) {
        echo ($num = $functions[$operation]($num)) . "\n";
    }
}

function chopNum(float $num): float
{
    return $num / 2;
}

function dice(float $num): float
{
    return sqrt($num);
}

function spice(float $num): float
{
    return ++$num;
}

function bake(float $num): float
{
    return $num * 3;
}

function fillet(float $num): float
{
    return $num * 0.8;
}