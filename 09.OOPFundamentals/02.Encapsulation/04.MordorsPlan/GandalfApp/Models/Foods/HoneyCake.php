<?php


namespace GandalfApp\Models\Foods;


class HoneyCake extends FoodBase
{
    const POINTS = 5;

    public function __construct()
    {
        parent::__construct(self::POINTS);
    }
}