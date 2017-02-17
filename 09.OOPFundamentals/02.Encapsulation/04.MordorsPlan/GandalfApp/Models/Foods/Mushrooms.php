<?php


namespace GandalfApp\Models\Foods;


class Mushrooms extends FoodBase
{
    const POINTS = -10;

    public function __construct()
    {
        parent::__construct(self::POINTS);
    }
}