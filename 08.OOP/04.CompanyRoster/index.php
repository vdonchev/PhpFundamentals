<?php
use Models\Company;
use Models\Department;
use Models\Employee;

spl_autoload_register(function (string $className) {
    require_once "{$className}.php";
});

$company = new Company();

$count = intval(trim(fgets(STDIN)));
for ($i = 0; $i < $count; $i++) {
    $input = explode(" ", trim(fgets(STDIN)));

    $name = $input[0];
    $salary = floatval($input[1]);
    $position = $input[2];
    $departmentName = $input[3];

    $email = null;
    $age = null;
    if (isset($input[4])) {
        if (is_numeric($input[4])) {
            $age = intval($input[4]);
        } else {
            $email = $input[4];
        }
    }

    if (isset($input[5])) {
        if (is_numeric($input[5])) {
            $age = intval($input[5]);
        }
    }

    if (!$company->hasDepartment($departmentName)) {
        $department = new Department($departmentName);
        $company->addDepartment($department);
    }

    $department = $company->getDepartment($departmentName);

    $employee = new Employee($name, $salary, $position, $department, $email, $age);
    $department->hireEmployee($employee);
}

$bestPaidDepartment = $company->getBestPaidDepartment();
echo "Highest Average Salary: {$bestPaidDepartment->getName()}" . PHP_EOL;
echo $bestPaidDepartment;