<?php


namespace GandalfApp\Models\Foods;


abstract class FoodBase
{
    private $points;

    public function __construct(int $points)
    {
        $this->points = $points;
    }

    public function getPoints(): int
    {
        return $this->points;
    }
}