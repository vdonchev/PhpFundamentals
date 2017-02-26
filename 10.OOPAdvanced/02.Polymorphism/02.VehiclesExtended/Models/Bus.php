<?php


namespace VehiclesExtended\Models;


class Bus extends Vehicle
{
    protected function setFuelConsumption(float $consumption)
    {
        $this->fuelConsumption = $consumption;
    }

    public function refuel(float $amount)
    {
        if ($amount > $this->tankCapacity - $this->fuel) {
            throw new \Exception("Cannot fit fuel in tank");
        }

        $this->fuel += $amount;
    }

    public function drive(float $distance, bool $empty = false): string
    {
        if (!$empty) {
            $this->fuelConsumption += 1.4;
            $res = parent::drive($distance);
            $this->fuelConsumption -= 1.4;

            return $res;
        }

        return parent::drive($distance);
    }
}