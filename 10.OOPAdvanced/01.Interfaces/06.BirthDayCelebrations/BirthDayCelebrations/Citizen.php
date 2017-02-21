<?php

namespace BirthDayCelebrations;

class Citizen implements IdentifiableInterface, NameInterface, BirthDayInterface
{
    private $name;
    private $age;
    private $id;
    private $birthDate;

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
}