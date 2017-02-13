<?php

namespace CarApp\Models;

class Car
{
    private $speed;
    private $fuel;
    private $fuelEconomy;
    private $distanceTraveled = 0.;
    private $timeTraveled = 0.;
    private $minutesPerKm = 0.;
    private $fuelPerKm = 0.;

    public function __construct(int $speed, float $fuel, float $fuelEconomy)
    {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;

        $this->initialize();
    }

    public function getFuel(): float
    {
        return $this->fuel;
    }

    public function getDistance(): float
    {
        return $this->distanceTraveled;
    }

    public function getTimeTraveled(): array
    {
        return [
            "hours" => floor($this->timeTraveled / 60),
            "minutes" => floor($this->timeTraveled % 60)
        ];
    }

    public function travel(float $distance)
    {
        $requiredFuel = $this->fuelPerKm * $distance;
        if ($requiredFuel <= $this->fuel) {
            $this->fuel -= $requiredFuel;
            $this->distanceTraveled += $distance;
            $this->timeTraveled += $distance * $this->minutesPerKm;
        } else {
            $possibleDistance = $this->fuel / $this->fuelPerKm;

            $this->distanceTraveled += $possibleDistance;
            $this->fuel = 0;
            $this->timeTraveled += $possibleDistance* $this->minutesPerKm;
        }
    }

    public function reFuel(float $fuel)
    {
        $this->fuel += $fuel;
    }

    private function initialize()
    {
        $this->minutesPerKm = 60 / $this->speed;
        $this->fuelPerKm = $this->fuelEconomy / 100;
    }
}