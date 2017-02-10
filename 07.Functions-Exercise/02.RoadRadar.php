<?php
declare(strict_types = 1);

$speed = intval(trim(fgets(STDIN)));
$area = trim(fgets(STDIN));
$areaLimit = getAreaLimit($area);
$infraction = getInfraction($speed, $areaLimit);
if ($infraction) {
    echo $infraction;
}

function getAreaLimit(string $area): int
{
    $limits = [
        "motorway" => 130,
        "interstate" => 90,
        "city" => 50,
        "residential" => 20
    ];

    if (!array_key_exists($area, $limits)) {
        return 1000;
    }

    return $limits[$area];
}

function getInfraction(int $speed, int $limit)
{
    $overSpeed = $speed - $limit;
    if ($overSpeed >= 0) {
        if ($overSpeed <= 20)
            return "speeding";

        if ($overSpeed <= 40)
            return "excessive speeding";

        return "reckless driving";
    }

    return false;
}