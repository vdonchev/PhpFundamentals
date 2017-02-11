<?php

namespace GoogleApp\Models;

class Car
{
    private $model;
    private $speed;

    public function __construct(string $model, int $speed)
    {
        $this->model = $model;
        $this->speed = $speed;
    }

    public function __toString(): string
    {
        return "{$this->model} {$this->speed}";
    }
}