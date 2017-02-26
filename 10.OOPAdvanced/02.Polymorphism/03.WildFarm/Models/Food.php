<?php


namespace WildFarm\Models;


abstract class Food
{
    protected $quantity;

    public function __construct(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}