<?php


namespace VehiclesExtended\Models;


abstract class Vehicle implements VehicleInterface
{
    protected $fuel;
    protected $fuelConsumption;
    protected $tankCapacity;

    public function __construct(float $fuel, float $fuelConsumption, float $tankCapacity)
    {
        $this->setFuel($fuel);
        $this->setFuelConsumption($fuelConsumption);
        $this->tankCapacity = $tankCapacity;
    }

    public function drive(float $distance): string
    {
        if ($distance * $this->fuelConsumption > $this->fuel)  {
            throw new \Exception("{$this->getClassName()} needs refueling");
        }

        $this->fuel -= $distance * $this->fuelConsumption;
        return "{$this->getClassName()} travelled {$distance} km";
    }

    public function __toString()
    {
        return $this->getClassName() . ": " . number_format($this->fuel, 2, ".", "");
    }

    protected function setFuel(float $value) {
        if ($value < 0) {
            throw new \Exception("Fuel must be a positive number");
        }

        $this->fuel = $value;
    }

    protected abstract function setFuelConsumption(float $consumption);

    private function getClassName(): string
    {
        return basename(get_class($this));
    }
}