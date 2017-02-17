<?php


namespace CatLadyApp\Cats;


abstract class Cat
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return (new \ReflectionClass($this))->getShortName() . " {$this->name}";
    }
}