<?php


namespace RadioApp\Helper;


class Validator
{
    private function __construct()
    {
    }

    public static function numberIsInRange(int $value, int $min, int $max, bool $inclusive = true): bool
    {
        if ($inclusive) {
            return $value >= $min && $value <= $max;
        }

        return $value > $min && $value < $max;
    }
}