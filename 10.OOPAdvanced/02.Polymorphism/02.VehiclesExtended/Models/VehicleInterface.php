<?php


namespace VehiclesExtended\Models;


interface VehicleInterface
{
    public function drive(float $distance): string;

    public function refuel(float $amount);
}