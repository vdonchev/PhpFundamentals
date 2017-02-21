<?php
declare(strict_types = 1);

use PersonInterface\Citizen;

require_once 'PersonInterface.php';
require_once 'Citizen.php';

$citizen = new Citizen("Pesho", 25);
echo $citizen->getName() . PHP_EOL;
echo $citizen->getAge();