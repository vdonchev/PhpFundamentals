<?php
declare(strict_types = 1);

use VehiclesExtended\Models\Bus;
use VehiclesExtended\Models\Car;
use VehiclesExtended\Models\Truck;
use VehiclesExtended\Models\VehicleInterface;

spl_autoload_register(function ($class) {
    $class = str_replace("VehiclesExtended\\", "", $class);
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

    require_once "{$class}.php";
});

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

/**
 * @var $vehicles VehicleInterface[]
 */
$vehicles = [];

$tokens = explode(" ", readLine());
$vehicles["Car"] = new Car(floatval($tokens[1]), floatval($tokens[2]), floatval($tokens[3]));

$tokens = explode(" ", readLine());
$vehicles["Truck"] = new Truck(floatval($tokens[1]), floatval($tokens[2]), floatval($tokens[3]));

$tokens = explode(" ", readLine());
$vehicles["Bus"] = new Bus(floatval($tokens[1]), floatval($tokens[2]), floatval($tokens[3]));

$linesCount = intval(readLine());
for ($i = 0; $i < $linesCount; $i++) {

    try {
        $command = explode(" ", readLine());
        if ($command[0] === "Drive") {
            writeLine($vehicles[$command[1]]->drive(floatval($command[2])));
            continue;
        }

        if ($command[0] === "Refuel") {
            $vehicles[$command[1]]->refuel(floatval($command[2]));
            continue;
        }

        if ($command[0] === "DriveEmpty") {
            $vehicles["Bus"]->drive(floatval($command[2]));
        }
    } catch (Exception $e) {
        writeLine($e->getMessage());
    }
}

writeLine(implode(PHP_EOL, $vehicles));
