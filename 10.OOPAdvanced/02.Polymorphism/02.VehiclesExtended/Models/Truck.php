<?php


namespace VehiclesExtended\Models;


class Truck extends Vehicle
{
    protected function setFuelConsumption(float $consumption)
    {
        $this->fuelConsumption = $consumption + 1.6;
    }

    public function refuel(float $amount)
    {
        $this->fuel += ($amount * 0.95);
    }
}