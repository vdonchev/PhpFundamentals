<?php

namespace BirthDayCelebrations;

class Pet implements NameInterface, BirthDayInterface
{
    private $name;
    private $birthDate;

    public function __construct(string $name, string $birthDate)
    {
        $this->name = $name;
        $this->birthDate = $birthDate;
    }

    public function getBirthDay(): string
    {
        return $this->birthDate;
    }

    public function getName(): string
    {
        return $this->name;
    }
}