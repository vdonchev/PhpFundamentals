<?php
declare(strict_types = 1);

$coordinates = array_map("floatval", explode(", ", trim(fgets(STDIN))));
for ($i = 0; $i < count($coordinates); $i += 3) {
    if (isset($coordinates[$i], $coordinates[$i + 1], $coordinates[$i + 2])) {
        echo findPointPosition(...array_slice($coordinates, $i, 3)) . "\n";
    }
}

function findPointPosition(float $x, float $y, float $z): string
{
    list($boxX1, $boxX2, $boxY1, $boxY2, $boxZ1, $boxZ2) = [10, 50, 20, 80, 15, 50];
    if ($x >= $boxX1 && $x <= $boxX2 &&
        $y >= $boxY1 && $y <= $boxY2 &&
        $z >= $boxZ1 && $z <= $boxZ2
    ) {
        return "inside";
    }

    return "outside";
}