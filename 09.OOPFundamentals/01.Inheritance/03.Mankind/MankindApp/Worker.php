<?php

namespace MankindApp;

class Worker extends Human
{
    private $salary;
    private $workHoursPerDay;

    public function __construct(string $firstName, string $lastName, float $salary, float $workHoursPerDay)
    {
        parent::__construct($firstName, $lastName);

        $this->setSalary($salary);
        $this->setWorkHoursPerDay($workHoursPerDay);
    }

    protected function setLastName(string $lastName)
    {
        if (!preg_match("/.{4,}/", $lastName)) {
            throw new \Exception("Expected length more than 3 symbols!Argument: lastName");
        }


        parent::setLastName($lastName);
    }

    protected function setSalary(float $salary)
    {
        if ($salary <= 10) {
            throw new \Exception("Expected value mismatch!Argument: weekSalary");
        }

        $this->salary = $salary;
    }

    protected function setWorkHoursPerDay(float $workHoursPerDay)
    {
        if ($workHoursPerDay < 1 || $workHoursPerDay > 12) {
            throw new \Exception("Expected value mismatch!Argument: workHoursPerDay");
        }

        $this->workHoursPerDay = $workHoursPerDay;
    }

    public function __toString(): string
    {
        $output = parent::__toString();
        $output .= "Week Salary: " . number_format($this->salary, 2, '.', ''). PHP_EOL;
        $output .= "Hours per day: " . number_format($this->workHoursPerDay, 2, '.', ''). PHP_EOL;
        $output .= "Salary per hour: " . number_format($this->calculateSalaryPerHour(), 2, '.', ''). PHP_EOL;

        return $output . PHP_EOL;
    }

    private function calculateSalaryPerHour(): float
    {
        return $this->salary / 7 / $this->workHoursPerDay;
    }
}