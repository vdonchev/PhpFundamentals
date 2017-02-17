<?php


namespace GandalfApp\Models\Foods;


class Lembas extends FoodBase
{
    const POINTS = 3;

    public function __construct()
    {
        parent::__construct(self::POINTS);
    }
}