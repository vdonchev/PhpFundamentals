<?php


namespace ClassBoxValidation;


class Helper
{
    /**
     * @param float $num
     * @param string $name
     * @throws \Exception
     */
    public static function validatePositiveNumber(float $num, string $name)
    {
        if ($num <= 0)
            throw new \Exception("{$name} cannot be zero or negative.");
    }
}