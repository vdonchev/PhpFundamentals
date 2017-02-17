<?php


namespace GandalfApp\Helpers;

class Validator
{
    private function __construct()
    {
    }

    public static function validateNumInRange(int $num, int $min, int $max): bool
    {
        return $num >= $min && $num <= $max;
    }
}