<?php
declare(strict_types = 1);

$inputData = array_map("floatval", explode(", ", trim(fgets(STDIN))));
$desiredThickness = array_shift($inputData);
$chunks = $inputData;

foreach ($chunks as $chunk) {
    echo "Processing chunk {$chunk} microns\n";

    $opCount = 0;
    while (($newSize = cut($chunk)) >= $desiredThickness) {
        $chunk = $newSize;
        $opCount++;
    }

    if ($opCount > 0) {
        echo "Cut x{$opCount}\n";
        $opCount = 0;
        $chunk = transportAndWash($chunk);
    }

    while (($newSize = lap($chunk)) >= $desiredThickness) {
        $chunk = $newSize;
        $opCount++;
    }

    if ($opCount > 0) {
        echo "Lap x{$opCount}\n";
        $opCount = 0;
        $chunk = transportAndWash($chunk);
    }

    while (($newSize = grind($chunk)) >= $desiredThickness) {
        $chunk = $newSize;
        $opCount++;
    }

    if ($opCount > 0) {
        echo "Grind x{$opCount}\n";
        $opCount = 0;
        $chunk = transportAndWash($chunk);
    }

    while (($newSize = etch($chunk)) >= $desiredThickness - 1) {
        $chunk = $newSize;
        $opCount++;
    }
    if ($opCount > 0) {
        echo "Etch x{$opCount}\n";
        $chunk = transportAndWash($chunk);
    }

    if ($chunk == $desiredThickness - 1) {
        $chunk = xRay($chunk);
        echo "X-ray x1\n";
    }

    echo "Finished crystal {$chunk} microns\n";
}

function cut(float $chunk): float
{
    return $chunk / 4;
}

function lap(float $chunk): float
{
    return $chunk * 0.80;
}

function grind(float $chunk): float
{
    return $chunk - 20;
}

function etch(float $chunk): float
{
    return $chunk - 2;
}

function xRay(float $chunk): float
{
    return $chunk + 1;
}

function transportAndWash(float $chunk): float
{
    echo "Transporting and washing\n";
    return floor($chunk);
}