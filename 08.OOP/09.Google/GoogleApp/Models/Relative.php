<?php

namespace GoogleApp\Models;

class Relative
{
    private $name;
    private $birthDate;

    public function __construct(string $name, string $birthDate)
    {
        $this->name = $name;
        $this->birthDate = $birthDate;
    }

    public function __toString(): string
    {
        return "{$this->name} {$this->birthDate}";
    }
}