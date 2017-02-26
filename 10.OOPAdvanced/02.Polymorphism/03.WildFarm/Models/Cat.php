<?php


namespace WildFarm\Models;


class Cat extends Feline
{
    const SOUND = "Meowwww";

    private $breed;

    public function __construct(string $name, string $type, float $weight, string $livingRegion, string $breed)
    {
        $this->breed = $breed;
        $this->sound = self::SOUND;

        parent::__construct($name, $type, $weight, $livingRegion);
    }

    function __toString()
    {
        return basename(get_class($this)) . "[{$this->name}, {$this->breed}, {$this->weight}, {$this->region}, {$this->foodEaten}]";
    }
}