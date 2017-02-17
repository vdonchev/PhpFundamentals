<?php
declare(strict_types = 1);

use MankindApp\Human;
use MankindApp\Student;
use MankindApp\Worker;

spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});

function readLine(): string
{
    return trim(fgets(STDIN));
}

$studentData = explode(" ", readLine());
$workerData = explode(" ", readLine());

/**
 * @var $humans Human[]
 */
$humans = [];
try {
    $humans[] = new Student(...$studentData);
    $humans[] = new Worker($workerData[0], $workerData[1], floatval($workerData[2]), floatval($workerData[3]));

    foreach ($humans as $human) {
        echo $human;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}