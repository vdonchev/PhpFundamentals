<?php

namespace GoogleApp\Models;

class Company
{
    private $name;
    private $department;
    private $salary;

    public function __construct(string $name, string $department, float $salary)
    {
        $this->name = $name;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function __toString(): string
    {
        $salary = number_format($this->salary, 2);
        return "{$this->name} {$this->department} {$salary}";
    }
}