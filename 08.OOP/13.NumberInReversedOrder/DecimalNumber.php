<?php


class DecimalNumber
{
    private $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function getNumberReversed(): string
    {
        return strrev($this->number . '');
    }
}