<?php
declare(strict_types = 1);

list($aX, $aY, $bX, $bY, $cX, $cY) = array_map("floatval", explode(", ", trim(fgets(STDIN))));
$distanceAB = calculateDistance($aX, $aY, $bX, $bY);
$distanceAC = calculateDistance($aX, $aY, $cX, $cY);
$distanceBC = calculateDistance($bX, $bY, $cX, $cY);

echo buildShortestPath($distanceAB, $distanceAC, $distanceBC);

function buildShortestPath(float $distanceA, float $distanceB, float $distanceC): string
{
    $output = "";
    if ($distanceA <= $distanceB && $distanceA <= $distanceC) {
        if ($distanceB <= $distanceC) {
            $output .= "1->2->3: " . ($distanceA + $distanceB);
        } else {
            $output .= "1->2->3: " . ($distanceA + $distanceC);
        }
    } else if ($distanceB <= $distanceA && $distanceB <= $distanceC) {
        if ($distanceA <= $distanceC) {
            $output .= "2->1->3: " . ($distanceA + $distanceB);
        } else {
            $output .= "1->3->2: " . ($distanceC + $distanceB);
        }
    } else {
        if ($distanceA <= $distanceB) {
            $output .= "1->2->3: " . ($distanceA + $distanceC);
        } else {
            $output .= "1->3->2: " . ($distanceC + $distanceB);
        }
    }

    return $output;
}

function calculateDistance(float $aX, float $aY, float $bX = 0., float $bY = 0.): float
{
    $xDistance = $bX - $aX;
    $yDistance = $bY - $aY;

    return sqrt(($xDistance * $xDistance) + ($yDistance * $yDistance));
}