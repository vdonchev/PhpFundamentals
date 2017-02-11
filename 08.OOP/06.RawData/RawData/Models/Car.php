<?php

namespace RawData\Models;

class Car
{
    private $model;
    private $engine;
    private $cargo;

    /**
     * @var Tire[]
     */
    private $tires = [];

    public function __construct(string $model,
                                Engine $engine,
                                Cargo $cargo,
                                Tire $tire1,
                                Tire $tire2,
                                Tire $tire3,
                                Tire $tire4)
    {
        $this->model = $model;
        $this->cargo = $cargo;
        $this->engine = $engine;

        array_push($this->tires, $tire1, $tire2, $tire3, $tire4);
    }

    public function __toString()
    {
        return $this->model;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getEngine(): Engine
    {
        return $this->engine;
    }

    public function getCargo(): Cargo
    {
        return $this->cargo;
    }

    /**
     * @return Tire[]
     */
    public function getTires(): array
    {
        return $this->tires;
    }
}