<?php

namespace FoodShortage;

class Rebel implements NameInterface, BuyerInterface
{
    private $name;
    private $age;
    private $group;
    private $food = 0;

    public function __construct(string $name, int $age, string $group)
    {
        $this->name = $name;
        $this->age = $age;
        $this->group = $group;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function BuyFood()
    {
        $this->setFood($this->getFood() + 5);
    }

    public function getFood(): int
    {
        return $this->food;
    }

    public function setFood(int $value)
    {
        $this->food = $value;
    }
}