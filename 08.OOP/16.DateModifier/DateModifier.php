<?php

/**
 * Class DateModifier
 * Simulates static class as we do not need to be instantiated. /no static classes in php/
 */
class DateModifier
{
    const DATE_FORMAT = "Y m d";

    public static function getDateDifference(string $dateA, string $dateB)
    {
        $dA = DateTime::createFromFormat(self::DATE_FORMAT, $dateA);
        $dB = DateTime::createFromFormat(self::DATE_FORMAT, $dateB);

        return $dA->diff($dB)->days;
    }
}