<?php


namespace GandalfApp\Models\Foods;


class Melon extends FoodBase
{
    const POINTS = 1;

    public function __construct()
    {
        parent::__construct(self::POINTS);
    }
}