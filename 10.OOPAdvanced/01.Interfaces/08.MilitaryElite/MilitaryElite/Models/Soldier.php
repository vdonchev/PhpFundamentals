<?php


namespace MilitaryElite\Models;


use MilitaryElite\Models\Contracts\SoldierInterface;

abstract class Soldier implements SoldierInterface
{
    private $id;
    private $firstName;
    private $lastName;

    public function __construct(int $id, string $firstName, string $lastName)
    {
        $this->setId($id);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setFirstName(string $name)
    {
        $this->firstName = $name;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setLastName(string $name)
    {
        $this->lastName = $name;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}