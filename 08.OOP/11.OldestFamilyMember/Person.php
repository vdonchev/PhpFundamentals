<?php

namespace FamilyMembers;

class Person
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function __toString()
    {
        return "{$this->name} {$this->age}";
    }
}