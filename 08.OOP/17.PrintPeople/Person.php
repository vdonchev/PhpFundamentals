<?php

namespace PrintPeople;

class Person
{
    private $name;
    private $age;
    private $occupation;

    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function __toString(): string
    {
        return "{$this->name} - age: {$this->age}, occupation: {$this->occupation}";
    }
}