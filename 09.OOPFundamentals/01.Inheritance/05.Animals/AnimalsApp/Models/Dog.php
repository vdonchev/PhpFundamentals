<?php


namespace AnimalsApp\Models;


class Dog extends Animal
{
    const SOUND = "BauBau";

    public function produceSound()
    {
        return self::SOUND;
    }
}