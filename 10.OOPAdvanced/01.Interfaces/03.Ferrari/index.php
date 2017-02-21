<?php
declare(strict_types = 1);

require_once "CarInterface.php";
require_once "Ferrari.php";

$person = trim(fgets(STDIN));
$ferrari = new Ferrari($person);
echo $ferrari;