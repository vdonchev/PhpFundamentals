<?php
declare(strict_types = 1);


spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});

$d = new \Mood3\Demon('"KoHaH"', 100, 100);
echo $d;
writeLine("");
$а = new \Mood3\Archangel('"Akasha"', 100, 5);
echo $а;


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