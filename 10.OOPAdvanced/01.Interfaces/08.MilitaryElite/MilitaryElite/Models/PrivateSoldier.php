<?php


namespace MilitaryElite\Models;


use MilitaryElite\Models\Contracts\PrivateSoldierInterface;

class PrivateSoldier extends Soldier implements PrivateSoldierInterface
{
    private $salary;

    public function __construct(int $id, string $firstName, string $lastName, float $salary)
    {
        parent::__construct($id, $firstName, $lastName);

        $this->setSalary($salary);
    }

    public function setSalary(float $salary)
    {
        $this->salary = $salary;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }
}