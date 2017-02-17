<?php


namespace CatLadyApp\Cats;


class StreetExtraordinaire extends Cat
{
    private $decibelsOfMeows;

    public function __construct(string $name, int $decibelsOfMeows)
    {
        parent::__construct($name);

        $this->decibelsOfMeows = $decibelsOfMeows;
    }

    public function __toString()
    {
        return parent::__toString() . " {$this->decibelsOfMeows}";
    }
}