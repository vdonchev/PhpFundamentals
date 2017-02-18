<?php
declare(strict_types = 1);

use ClassBoxValidation\Box;

require_once "Box.php";
require_once "Helper.php";

list($length, $width, $height) = array_map("floatval", [readLine(), readLine(), readLine()]);

try {
    $box = new Box($length, $width, $height);

    writeLine("Surface Area - " . number_format($box->getSurfaceArea(), 2, ".", ""));
    writeLine("Lateral Surface Area - " . number_format($box->getLateralSurfaceArea(), 2, ".", ""));
    writeLine("Volume - " . number_format($box->getVolume(), 2, ".", ""));
} catch (Exception $e) {
    writeLine($e->getMessage());
}

/**
 * @param $content mixed
 * @return void
 */
function writeLine($content)
{
    echo $content . PHP_EOL;
}

function readLine(): string
{
    return trim(fgets(STDIN));
}