<?php

namespace CarApp;

use CarApp\Models\Car;

class App
{
    const END_OF_INPUT = "END";
    const DELIMITER = " ";

    /**
     * @var Car
     */
    private $car;

    public function start()
    {
        $this->processInput();
    }

    private function processInput()
    {
        $carTokens = explode(self::DELIMITER, $this->readLine());
        $this->car = new Car($carTokens[0], floatval($carTokens[1]), floatval($carTokens[2]));

        while (true) {
            $commandTokens = explode(self::DELIMITER, $this->readLine());
            if ($commandTokens[0] === self::END_OF_INPUT) {
                break;
            }

            $command = array_shift($commandTokens);
            switch ($command) {
                case "Travel":
                    $this->car->travel(floatval($commandTokens[0]));
                    break;
                case "Refuel":
                    $this->car->reFuel(floatval($commandTokens[0]));
                    break;
                case "Distance":
                    $this->printDistance();
                    break;
                case "Time":
                    $this->printTime();
                    break;
                case "Fuel":
                    $this->printFuel();
                    break;
                default:
                    throw new \Exception("Invalid operation supplied!");
            }
        }
    }

    private function printDistance()
    {
        $distance = $this->formatFloat($this->car->getDistance());
        $this->writeLine("Total distance: {$distance} kilometers");
    }

    private function printTime()
    {
        $time = $this->car->getTimeTraveled();
        $this->writeLine("Total time: {$time['hours']} hours and {$time['minutes']} minutes");
    }

    private function printFuel()
    {
        $fuel = $this->formatFloat($this->car->getFuel());
        $this->writeLine("Fuel left: {$fuel} liters");
    }

    private function formatFloat(float $float): string
    {
        return number_format(round($float, 1), 1);
    }

    private function readLine(): string
    {
        return trim(fgets(STDIN));
    }

    /**
     * @param $content mixed
     */
    private function writeLine($content)
    {
        echo $content . PHP_EOL;
    }
}