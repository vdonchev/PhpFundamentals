<?php


namespace MilitaryElite\Models;


use MilitaryElite\Models\Contracts\RepairInterface;

class Repair implements RepairInterface
{
    private $name;
    private $workHours;

    public function __construct($name, $workHours)
    {
        $this->setName($name);
        $this->setWorkHours($workHours);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getWorkHours(): int
    {
        return $this->workHours;
    }

    public function setWorkHours(int $hours)
    {
        $this->workHours = $hours;
    }
}