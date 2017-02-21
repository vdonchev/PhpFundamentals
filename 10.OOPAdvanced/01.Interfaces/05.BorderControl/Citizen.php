<?php

namespace BorderControl;

class Citizen implements IdentifiableInterface
{
    private $name;
    private $age;
    private $id;

    public function __construct(string $name, int $age, string $id)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }
}