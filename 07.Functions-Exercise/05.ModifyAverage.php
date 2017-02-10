<?php
declare(strict_types = 1);

echo generateAverageNumber(trim(fgets(STDIN)));
function generateAverageNumber(string $num)
{
    $digits = array_map("intval", str_split($num, 1));
    $average = calculateAverage($digits);
    if ($average > 5)
        return $num;

    return generateAverageNumber($num . 9);
}

function calculateAverage(array $numbers): float
{
    return array_sum($numbers) / count($numbers);
}