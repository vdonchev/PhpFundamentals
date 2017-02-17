<?php


namespace ShoppingApp\Helpers;

use Exception;

class Validator
{
    private function __construct()
    {
        // Simulate static class by preventing instantiation
    }

    /**
     * @param float $num
     * @param string $valName
     * @throws Exception
     */
    public static function validatePositiveNumber(float $num, string $valName)
    {
        if ($num < 0)
            throw new Exception("{$valName} cannot be negative");
    }

    /**
     * @param string $str
     * @param string $valName
     * @throws Exception
     */
    public static function validateNonEmptyString(string $str, string $valName)
    {
        if (strlen($str) == 0)
            throw new Exception("{$valName} cannot be empty");
    }
}