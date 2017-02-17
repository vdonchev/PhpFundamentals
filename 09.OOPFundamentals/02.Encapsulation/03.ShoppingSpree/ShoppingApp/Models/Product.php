<?php


namespace ShoppingApp\Models;


use ShoppingApp\Helpers\Validator;

class Product
{
    private $name;
    private $price;

    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setPrice($money);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setName(string $name)
    {
        Validator::validateNonEmptyString($name, "Name");
        $this->name = $name;
    }

    public function setPrice(float $price)
    {
        Validator::validatePositiveNumber($price, "Price");
        $this->price = $price;
    }
}