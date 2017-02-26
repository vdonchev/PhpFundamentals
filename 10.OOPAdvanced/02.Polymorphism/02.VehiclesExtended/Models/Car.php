<?php


namespace VehiclesExtended\Models;


class Car extends Vehicle
{
    protected function setFuelConsumption(float $consumption)
    {
        $this->fuelConsumption = $consumption + 0.9;
    }

    public function refuel(float $amount)
    {
        if ($amount > $this->tankCapacity - $this->fuel) {
            throw new \Exception("Cannot fit fuel in tank");
        }

        $this->fuel += $amount;
    }
}