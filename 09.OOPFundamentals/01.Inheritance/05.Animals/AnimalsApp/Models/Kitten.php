<?php


namespace AnimalsApp\Models;


class Kitten extends Cat
{
    const SOUND = "Miau";
    const GENDER = "Female";

    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age, self::GENDER);
    }

    public function produceSound()
    {
        return self::SOUND;
    }
}