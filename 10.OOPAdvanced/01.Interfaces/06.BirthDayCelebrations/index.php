<?php
declare(strict_types = 1);

use BirthDayCelebrations\BirthDayInterface;
use BirthDayCelebrations\Citizen;
use BirthDayCelebrations\Pet;

spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});

/**
 * @var $entries BirthDayInterface[]
 */
$entries = [];

while (true) {
    $tokens = explode(" ", readLine());
    if ($tokens[0] === "End") {
        break;
    }

    $type = array_shift($tokens);
    if ($type === "Pet") {
        $entries[] = new Pet(...$tokens);
        continue;
    }

    if ($type === "Citizen") {
        $entries[] = new Citizen($tokens[0], intval($tokens[1]), $tokens[2], $tokens[3]);
    }
}

$dateNeedle = readLine();

foreach ($entries as $entry) {
    if (preg_match("/" . $dateNeedle . "$/", $entry->getBirthDay())) {
        writeLine($entry->getBirthDay());
    }
}

function readLine(): string
{
    return trim(fgets(STDIN));
}

/**
 * @param $content mixed
 * @return void
 */
function writeLine($content)
{
    echo $content . PHP_EOL;
}