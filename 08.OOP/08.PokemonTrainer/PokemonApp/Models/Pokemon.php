<?php

namespace PokemonApp\Models;

class Pokemon
{
    private $name;
    private $element;
    private $health;

    public function __construct(string $name, string $element, int $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getElement(): string
    {
        return $this->element;
    }

    public function reduceHealth(int $value)
    {
        $this->health -= $value;
    }

    public function isAlive(): bool
    {
        return $this->health > 0;
    }
}