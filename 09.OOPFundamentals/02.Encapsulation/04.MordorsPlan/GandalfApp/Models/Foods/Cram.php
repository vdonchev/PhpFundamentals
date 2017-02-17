<?php


namespace GandalfApp\Models\Foods;


class Cram extends FoodBase
{
    const POINTS = 2;

    public function __construct()
    {
        parent::__construct(self::POINTS);
    }
}