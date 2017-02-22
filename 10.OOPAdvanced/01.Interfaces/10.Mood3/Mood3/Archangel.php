<?php


namespace Mood3;


class Archangel extends CharacterBase
{
    private $specialPoints;

    public function __construct(string $username, int $level, int $specialPoints)
    {
        parent::__construct($username, $level);

        $this->setSpecialPoints($specialPoints);
        $this->setHashedPassword();
    }

    public function getSpecialPoints()
    {
        return $this->specialPoints;
    }

    public function setSpecialPoints($points)
    {
        $this->specialPoints = $points;
    }

    private function setHashedPassword()
    {
        $this->hashedPassword = strrev($this->getUsername())  . strlen($this->getUsername())* 21;
    }

    function __toString()
    {
        return parent::__toString() . PHP_EOL
            . $this->specialPoints * $this->getLevel();
    }
}