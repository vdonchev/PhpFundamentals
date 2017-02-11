<?php
require_once "../01.DefinePerson+CreateConstructor/Person.php";

$num = intval(trim(fgets(STDIN)));

/**
 * @var Person[]
 */
$persons = [];
for ($i = 0; $i < $num; $i++) {
    $input = explode(" ", trim(fgets(STDIN)));

    $name = $input[0];
    $age = intval($input[1]);

    $persons[] = new Person($name, $age);
}

$filteredPersons = array_filter($persons, function (Person $person) {
    return $person->getAge() > 30;
});

usort($filteredPersons, function (Person $personA, Person $personB) {
    return $personA->getName() <=> $personB->getName();
});

foreach ($filteredPersons as $person) {
    echo $person . PHP_EOL;
}