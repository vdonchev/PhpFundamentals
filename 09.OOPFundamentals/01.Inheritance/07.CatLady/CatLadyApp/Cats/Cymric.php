<?php


namespace CatLadyApp\Cats;


class Cymric extends Cat
{
    private $furLength;

    public function __construct(string $name, int $furLength)
    {
        parent::__construct($name);

        $this->furLength = $furLength;
    }

    public function __toString()
    {
        return parent::__toString() . " {$this->furLength}";
    }
}