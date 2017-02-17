<?php

namespace Classes;

abstract class Person
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    protected function setName(string $name)
    {
        if (strlen($name) <= 3) {
            throw new \Exception("Name’s length should not be less than 3 symbols!");
        }

        $this->name = $name;
    }

    protected function setAge(int $age)
    {
        if ($age < 1) {
            throw new \Exception("Age must be positive!");
        }

        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}