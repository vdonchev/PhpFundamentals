<?php
declare(strict_types = 1);

define("DNA", "ATCGTTAGGG");
$height = intval(trim(fgets(STDIN)));
for ($row = 0; $row < $height; $row++) {
    switch ($row % 4) {
        case 0:
            echo "**" . getNextLetter() . getNextLetter() . "**\n";
            break;
        case 1:
            echo "*" . getNextLetter() . "--" . getNextLetter() . "*\n";
            break;
        case 2:
            echo getNextLetter() . "----" . getNextLetter() . "\n";
            break;
        default:
            echo "*" . getNextLetter() . "--" . getNextLetter() . "*\n";
            break;
    }
}

function getNextLetter(): string
{
    static $lettersIndex = 0;
    return DNA[$lettersIndex++ % strlen(DNA)];
}