<?php
declare(strict_types = 1);

use MultiplyImplementations\Citizen;

require_once 'Models/PersonInterface.php';
require_once 'Models/Identifiable.php';
require_once 'Models/Bithable.php';
require_once 'Models/Citizen.php';

$citizen = new Citizen("Pesho", 25, "9105152287", "15/05/1991");

echo $citizen->getName() . PHP_EOL;
echo $citizen->getAge() . PHP_EOL;
echo $citizen->getId() . PHP_EOL;
echo $citizen->getBirthDate();