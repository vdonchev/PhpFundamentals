<?php
declare(strict_types = 1);
list($x1, $y1, $x2, $y2) = array_map("intval", explode(", ", trim(fgets(STDIN))));
$distanceA = getDistanceType(calculateDistance($x1, $y1));
$distanceB = getDistanceType(calculateDistance($x2, $y2));
$distanceC = getDistanceType(calculateDistance($x1, $y1, $x2, $y2));

echo "{{$x1}}, {{$y1}} to {0}, {0} is {$distanceA}\n";
echo "{{$x2}}, {{$y2}} to {0}, {0} is {$distanceB}\n";
echo "{{$x1}}, {{$y1}} to {{$x2}}, {{$y2}} is {$distanceC}";

function calculateDistance(int $aX, int $aY, int $bX = 0, int $bY = 0): float
{
    $xDistance = $bX - $aX;
    $yDistance = $bY - $aY;

    return sqrt(($xDistance * $xDistance) + ($yDistance * $yDistance));
}

function getDistanceType(float $distance): string
{
    return round($distance) == $distance ? "valid" : "invalid";
}