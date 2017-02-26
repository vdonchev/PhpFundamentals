<?php


namespace Vehicles\Models;


abstract class Vehicle implements VehicleInterface
{
    protected $fuel;
    protected $fuelConsumption;

    public function __construct(float $fuel, float $fuelConsumption)
    {
        $this->fuel = $fuel;
        $this->setFuelConsumption($fuelConsumption);
    }

    public function drive(float $distance): string
    {
        if ($distance * $this->fuelConsumption > $this->fuel)  {
            throw new \Exception("{$this->getClassName()} needs refueling");
        }

        $this->fuel -= $distance * $this->fuelConsumption;
        return "{$this->getClassName()} travelled {$distance} km";
    }

    protected abstract function setFuelConsumption(float $consumption);

    public function __toString()
    {
        return $this->getClassName() . ": " . number_format($this->fuel, 2, ".", "");
    }

    private function getClassName(): string
    {
        return basename(get_class($this));
    }
}