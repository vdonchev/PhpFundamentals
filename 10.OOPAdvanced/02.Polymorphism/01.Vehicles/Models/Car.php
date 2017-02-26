<?php


namespace Vehicles\Models;


class Car extends Vehicle
{
    protected function setFuelConsumption(float $consumption)
    {
        $this->fuelConsumption = $consumption + 0.9;
    }

    public function refuel(float $amount)
    {
        $this->fuel += $amount;
    }
}