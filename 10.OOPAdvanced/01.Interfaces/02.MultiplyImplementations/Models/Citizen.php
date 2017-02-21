<?php

namespace MultiplyImplementations;

class Citizen implements PersonInterface, Identifiable, Bithable
{
    private $name;
    private $age;
    private $id;
    private $birthDate;

    public function __construct(
        string $name,
        int $age,
        string $id,
        string $birthDate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthDate($birthDate);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    public function setBirthDate(string $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }
}