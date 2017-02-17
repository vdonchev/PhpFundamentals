<?php


namespace AnimalsApp\Models;


use AnimalsApp\Models\Contracts\SoundProducible;

abstract class Animal implements SoundProducible
{
    const INVALID_INPUT_MSG = "Invalid input!";

    private $name;
    private $age;
    private $gender;

    public function __construct(string $name, int $age, string $gender)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setGender($gender);
    }

    public function setName(string $name)
    {
        if (empty(trim($name))) {
            throw new \Exception(self::INVALID_INPUT_MSG);
        }

        $this->name = $name;
    }

    public function setAge(int $age)
    {
        if ($age <= 0) {
            throw new \Exception(self::INVALID_INPUT_MSG);
        }

        $this->age = $age;
    }

    public function setGender(string $gender)
    {
        if (empty(trim($gender))) {
            throw new \Exception(self::INVALID_INPUT_MSG);
        }

        $this->gender = $gender;
    }

    public function __toString()
    {
        $output = (new \ReflectionClass($this))->getShortName()
            . " {$this->name} {$this->age} {$this->gender}" . PHP_EOL
            . $this->produceSound();

        return $output;
    }
}