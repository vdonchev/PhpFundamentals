<?php


namespace GandalfApp\Factories;


use GandalfApp\Models\Foods\Apple;
use GandalfApp\Models\Foods\Cram;
use GandalfApp\Models\Foods\HoneyCake;
use GandalfApp\Models\Foods\Lembas;
use GandalfApp\Models\Foods\Melon;
use GandalfApp\Models\Foods\Mushrooms;
use GandalfApp\Models\Foods\RegularFood;

class FoodFactory
{
    private function __construct()
    {
    }

    public static function create(string $name)
    {
        switch (strtolower($name)) {
            case "cram":
                return new Cram();
            case "lembas":
                return new Lembas();
            case "apple":
                return new Apple();
            case "melon":
                return new Melon();
            case "honeycake":
                return new HoneyCake();
            case "mushrooms":
                return new Mushrooms();
            default:
                return new RegularFood();
        }
    }
}