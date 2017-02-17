<?php


namespace AnimalsApp\Models;


class Frog extends Animal
{
    const SOUND = "Frogggg";

    public function produceSound()
    {
        return self::SOUND;
    }
}