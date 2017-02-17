<?php


namespace AnimalsApp\Models;


class Tomcat extends Cat
{
    const SOUND = "Give me one million b***h";
    const GENDER = "Male";

    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age, self::GENDER);
    }

    public function produceSound()
    {
        return self::SOUND;
    }
}