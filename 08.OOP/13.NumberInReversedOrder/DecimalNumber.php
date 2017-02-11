<?php


class DecimalNumber
{
    private $number;

    public function __construct(float $number)
    {
        $this->number = $number;
    }

    public function getNumberReversed(): float
    {
        $reversed = floatval(strrev($this->number . ''));
        if ($this->number < 0) {
            return - $reversed;
        }

        return $reversed;
    }
}