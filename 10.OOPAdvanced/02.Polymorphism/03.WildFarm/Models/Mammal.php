<?php


namespace WildFarm\Models;


abstract class Mammal extends Animal
{
    protected $region;

    public function __construct(string $name, string $type, float $weight, string $livingRegion)
    {
        $this->region = $livingRegion;

        parent::__construct($name, $type, $weight);
    }

    function __toString()
    {
        return parent::__toString() . "[{$this->name}, {$this->weight}, {$this->region}, {$this->foodEaten}]";
    }
}