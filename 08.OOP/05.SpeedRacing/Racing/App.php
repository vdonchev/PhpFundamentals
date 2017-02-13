<?php

namespace Racing;

use Racing\Models\Car;

class App
{
    const END_COMMAND = "End";

    /**
     * @var Car[]
     */
    private $cars = [];

    public function start()
    {
        $this->processInput();
    }

    private function processInput()
    {
        $numOfCars = intval($this->readLine());
        for ($i = 0; $i < $numOfCars; $i++) {
            $carDetails = explode(" ", $this->readLine());
            $car = new Car(...$carDetails);
            $this->addCar($car);
        }

        while (true) {
            $commandTokens = explode(" ", $this->readLine());
            if ($commandTokens[0] === self::END_COMMAND) {
                break;
            }

            try {
                $car = $this->cars[$commandTokens[1]];
                $car->travel(floatval($commandTokens[2]));
            } catch (\Exception $e) {
                $this->writeLine($e->getMessage());
            }
        }

        $this->renderAllCars();
    }

    private function addCar(Car $car)
    {
        $this->cars[$car->getModelName()] = $car;
    }

    private function renderAllCars()
    {
        foreach ($this->cars as $carModel => $car) {
            $this->writeLine($car);
        }
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