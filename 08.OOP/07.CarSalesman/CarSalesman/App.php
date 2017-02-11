<?php

namespace CarSalesman;

use CarSalesman\Models\Car;
use CarSalesman\Models\Engine;

class App
{
    /**
     * @var Engine[]
     */
    private $engines = [];

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
        $enginesCount = intval($this->readLine());
        for ($i = 0; $i < $enginesCount; $i++) {
            $engineData = explode(" ", $this->readLine());
            $engineModel = $engineData[0];
            $enginePower = intval($engineData[1]);
            $engineDisplacement = null;
            $engineEfficiency = null;
            if (count($engineData) > 2) {
                if (is_numeric($engineData[2])) {
                    $engineDisplacement = intval($engineData[2]);
                } else {
                    $engineEfficiency = $engineData[2];
                }
            }

            if (count($engineData) > 3) {
                $engineEfficiency = $engineData[3];
            }

            $selectedEngine = new Engine($engineModel, $enginePower, $engineDisplacement, $engineEfficiency);
            $this->addEngine($selectedEngine);
        }

        $carsCount = intval($this->readLine());
        for ($i = 0; $i < $carsCount; $i++) {
            $carData = explode(" ", $this->readLine());
            $carModel = $carData[0];
            $carEngine = $carData[1];
            $carWeight = null;
            $carColor = null;
            if (count($carData) > 2) {
                if (is_numeric($carData[2])) {
                    $carWeight = intval($carData[2]);
                } else {
                    $carColor = $carData[2];
                }
            }

            if (count($carData) > 3) {
                $carColor = $carData[3];
            }

            $selectedEngine = $this->getEngineByName($carEngine);
            $car = new Car($carModel, $selectedEngine, $carWeight, $carColor);
            $this->addCar($car);
        }

        $this->printCars();
    }

    private function addEngine(Engine $engine)
    {
        $this->engines[$engine->getModel()] = $engine;
    }

    private function addCar(Car $car)
    {
        $this->cars[] = $car;
    }

    private function getEngineByName(string $name): Engine
    {
        return $this->engines[$name];
    }

    private function printCars()
    {
        foreach ($this->cars as $car) {
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