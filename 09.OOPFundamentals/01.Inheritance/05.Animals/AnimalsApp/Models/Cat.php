<?php


namespace AnimalsApp\Models;


class Cat extends Animal
{
    const SOUND = "MiauMiau";

    public function produceSound()
    {
        return self::SOUND;
    }
}