<?php
declare(strict_types = 1);

use PersonInterface\Citizen;

require_once 'PersonInterface.php';
require_once 'Citizen.php';

$name = trim(fgets(STDIN));
$age = intval(trim(fgets(STDIN)));

$citizen = new Citizen($name, $age);
echo $citizen->getName() . PHP_EOL;
echo $citizen->getAge();