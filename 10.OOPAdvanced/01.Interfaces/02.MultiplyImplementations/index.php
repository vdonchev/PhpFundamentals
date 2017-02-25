<?php
declare(strict_types = 1);

use MultiplyImplementations\Citizen;

require_once 'Models/PersonInterface.php';
require_once 'Models/Identifiable.php';
require_once 'Models/Bithable.php';
require_once 'Models/Citizen.php';

$name = trim(fgets(STDIN));
$age = intval(trim(fgets(STDIN)));
$id = trim(fgets(STDIN));
$birthDate = trim(fgets(STDIN));

$citizen = new Citizen($name, $age, $id, $birthDate);

echo $citizen->getName() . PHP_EOL;
echo $citizen->getAge() . PHP_EOL;
echo $citizen->getId() . PHP_EOL;
echo $citizen->getBirthDate();