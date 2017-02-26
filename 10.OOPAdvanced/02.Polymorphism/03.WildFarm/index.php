<?php
declare(strict_types=1);

use WildFarm\Models\Cat;
use WildFarm\Models\Meat;
use WildFarm\Models\Mouse;
use WildFarm\Models\Tiger;
use WildFarm\Models\Vegetable;
use WildFarm\Models\Zebra;

spl_autoload_register(function ($class) {
    $class = str_replace("WildFarm\\", "", $class);
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

    require_once "{$class}.php";
});

while (true) {
    $input = readLine();
    if ($input === "End") {
        break;
    }
    $animal = null;
    $animalData = explode(" ", $input);
    switch ($animalData[0]) {
        case "Cat":
            $animal = new Cat($animalData[1], $animalData[0], floatval($animalData[2]), $animalData[3], $animalData[4]);
            break;
        case "Tiger":
            $animal = new Tiger($animalData[1], $animalData[0], floatval($animalData[2]), $animalData[3]);
            break;
        case "Zebra":
            $animal = new Zebra($animalData[1], $animalData[0], floatval($animalData[2]), $animalData[3]);
            break;
        case "Mouse":
            $animal = new Mouse($animalData[1], $animalData[0], floatval($animalData[2]), $animalData[3]);
            break;
    }

    $food = null;
    $foodData = explode(" ", readLine());
    switch ($foodData[0]) {
        case "Meat":
            $food = new Meat(intval($foodData[1]));
            break;
        case "Vegetable":
            $food = new Vegetable(intval($foodData[1]));
            break;
    }

    writeLine($animal->makeSound());

    try {
        $animal->eat($food);
    } catch (Exception $e) {
        writeLine($e->getMessage());
    }

    writeLine($animal);
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