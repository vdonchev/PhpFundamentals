<?php


namespace CatLadyApp\Cats;


class Siamese extends Cat
{
    private $earSize;

    public function __construct(string $name, int $earSize)
    {
        parent::__construct($name);

        $this->earSize = $earSize;
    }

    public function __toString()
    {
        return parent::__toString() . " {$this->earSize}";
    }
}