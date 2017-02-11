<?php

namespace Racing\Models;

class Car
{
    const INIT_DISTANCE = 0.;

    private $model;
    private $fuel;
    private $fuelConsumption;
    private $distanceTraveled;

    public function __construct(string $model, float $fuel, float $fuelConsumption)
    {
        $this->model = $model;
        $this->fuel = $fuel;
        $this->fuelConsumption = $fuelConsumption;

        $this->distanceTraveled = self::INIT_DISTANCE;
    }

    public function getModelName(): string
    {
        return $this->model;
    }

    public function travel(float $distance)
    {
        $fuelNeeded = $distance * $this->fuelConsumption;
        if ($fuelNeeded > $this->fuel) {
            throw new \Exception("Insufficient fuel for the drive");
        }

        $this->fuel -= $fuelNeeded;
        $this->distanceTraveled += $distance;
    }

    public function __toString(): string
    {
        return $this->model . " " . number_format($this->fuel, 2) . " " . $this->distanceTraveled;
    }
}