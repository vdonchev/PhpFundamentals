<?php

namespace CarSalesman\Models;

class Car
{
    private $model;
    private $engine;
    private $weight;
    private $color;

    public function __construct(string $model, Engine $engine, int $weight = null, string $color = null)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }

    public function __toString(): string
    {
        $output = "{$this->model}:" . PHP_EOL;
        $output .= $this->engine;

        $weight = $this->weight == null ? "n/a" : $this->weight;
        $output .= "  Weight: {$weight}" . PHP_EOL;

        $color = $this->color == null ? "n/a" : $this->color;
        $output .= "  Color: {$color}";

        return $output;
    }
}