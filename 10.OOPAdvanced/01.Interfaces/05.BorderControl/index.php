<?php
declare(strict_types = 1);

use BorderControl\Citizen;
use BorderControl\IdentifiableInterface;
use BorderControl\Robot;

require_once "IdentifiableInterface.php";
require_once "Robot.php";
require_once "Citizen.php";

/**
 * @var $entries IdentifiableInterface[]
 */
$entries = [];

while (true) {
    $tokens = explode(" ", readLine());
    if ($tokens[0] == "End") {
        break;
    }

    if (count($tokens) == 3) {
        $entries[] = new Citizen($tokens[0], intval($tokens[1]), $tokens[2]);
    } else {
        $entries[] = new Robot(...$tokens);
    }
}

$bannedId = readLine();
foreach ($entries as $entry) {
    if (preg_match("/" . $bannedId . "$/", $entry->getId())) {
        writeLine($entry->getId());
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