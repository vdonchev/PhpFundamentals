<?php
namespace Models;

class Department
{
    /**
     * @var Employee[]
     */
    private $employees = [];
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function hireEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }

    public function getAverageSalary(): float
    {
        return array_sum(array_map(function (Employee $employee) {
                return $employee->getSalary();
            }, $this->employees)) / count($this->employees);
    }

    private function sortEmployeesBySalary(bool $desc = false)
    {
        usort($this->employees, function (Employee $employeeA, Employee $employeeB) {
            return $employeeA->getSalary() <=> $employeeB->getSalary();
        });

        if ($desc) {
            $this->employees = array_reverse($this->employees);
        }
    }

    public function __toString(): string
    {
        $this->sortEmployeesBySalary(true);

        $output = "";
        foreach ($this->employees as $employee) {
            $output .= $employee . PHP_EOL;
        }

        return $output;
    }
}