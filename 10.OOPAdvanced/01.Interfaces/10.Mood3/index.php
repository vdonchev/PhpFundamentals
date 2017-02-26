<?php
declare(strict_types = 1);


use Mood3\Archangel;
use Mood3\Demon;

spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});

$character = null;
$input = explode(" | ", readLine());
if ($input[1] === "Archangel") {
    $character = new Archangel($input[0], intval($input[2]), intval($input[3]));
} else {
    $character = new Demon($input[0], intval($input[2]), floatval($input[3]));
}

echo $character;

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