<?php

namespace FoodShortage;

class Citizen implements IdentifiableInterface, NameInterface, BirthDayInterface, BuyerInterface
{
    private $name;
    private $age;
    private $id;
    private $birthDate;
    private $food = 0;

    public function __construct(string $name, int $age, string $id, string $birthDay)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
        $this->birthDate = $birthDay;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBirthDay(): string
    {
        return $this->birthDate;
    }

    public function BuyFood()
    {
        $this->setFood($this->getFood() + 10);
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