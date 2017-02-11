<?php

namespace CarSalesman\Models;

class Engine
{
    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    public function __construct(string $model, int $power, int $displacement = null, string $efficiency = null)
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function __toString(): string
    {
        $output = "  {$this->getModel()}:" . PHP_EOL;
        $output .= "    Power: {$this->power}" . PHP_EOL;

        $displacement = $this->displacement == null ? "n/a" : $this->displacement;
        $output .= "    Displacement: {$displacement}" . PHP_EOL;

        $efficiency = $this->efficiency == null ? "n/a" : $this->efficiency;
        $output .= "    Efficiency: {$efficiency}" . PHP_EOL;

        return $output;
    }
}