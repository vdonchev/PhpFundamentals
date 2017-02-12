<?php
use PrintPeople\Person;

require_once 'Person.php';

/**
 * @var Person[]
 */
$people = [];

while (true) {
    $tokens = explode(" ", trim(fgets(STDIN)));
    if ($tokens[0] === "END") {
        break;
    }

    $people[] = new Person($tokens[0], intval($tokens[1]), $tokens[2]);
}

usort($people, function (Person $p1, Person $p2) {
    return $p1->getAge() <=> $p2->getAge();
});

echo implode(PHP_EOL, $people);