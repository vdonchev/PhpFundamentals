<?php
require_once "Person.php";

$persons = [];
$persons[] = new Person("Pesho", 20);
$persons[] = new Person("Gosho", 18);
$persons[] = new Person("Stamat", 43);

foreach ($persons as $person) {
    echo $person . PHP_EOL;
}