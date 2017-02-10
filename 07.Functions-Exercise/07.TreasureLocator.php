<?php
$islands = [
    "Tuvalu" => new Island(1, 3, 1, 3),
    "Tokelau" => new Island(8, 9, 0, 1),
    "Samoa" => new Island(5, 7, 3, 6),
    "Tonga" => new Island(0, 2, 6, 8),
    "Cook" => new Island(4, 9, 7, 8),
];

$coordinates = array_map("floatval", explode(", ", trim(fgets(STDIN))));
for ($i = 0; $i < count($coordinates); $i += 2) {
    $x = $coordinates[$i];
    $y = $coordinates[$i + 1];
    $onIsland = '';
    foreach ($islands as $islandName => $island) {
        if ($island->isOnIsland($x, $y)) {
            $onIsland = $islandName;
            break;
        }
    }

    echo $onIsland ? "{$onIsland}\n" : "On the bottom of the ocean\n";
}

class Island
{
    function __construct($x1, $x2, $y1, $y2)
    {
        $this->x1 = $x1;
        $this->x2 = $x2;
        $this->y1 = $y1;
        $this->y2 = $y2;
    }

    function isOnIsland(float $x, float $y): bool
    {
        if ($x >= $this->x1 && $x <= $this->x2 &&
            $y >= $this->y1 && $y <= $this->y2
        ) {
            return true;
        }

        return false;
    }
}