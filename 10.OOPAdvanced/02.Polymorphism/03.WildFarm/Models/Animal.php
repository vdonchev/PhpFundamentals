<?php


namespace WildFarm\Models;


abstract class Animal
{
    protected $name;
    protected $type;
    protected $weight;
    protected $foodEaten = 0;
    protected $sound;

    public function __construct(string $name, string $type, float $weight)
    {
        $this->name = $name;
        $this->type = $type;
        $this->weight = $weight;
    }

    public function makeSound()
    {
        return $this->sound;
    }

    public function eat(Food $food)
    {
        $this->foodEaten += $food->getQuantity();
    }

    function __toString()
    {
        return basename(get_class($this));
    }
}