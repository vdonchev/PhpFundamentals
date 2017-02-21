<?php

class Ferrari implements CarInterface
{
    private $driversName;
    private $model;

    public function __construct(string $driversName, string $model = "488-Spider")
    {
        $this->driversName = $driversName;
        $this->model = $model;
    }

    public function gas(): string
    {
        return "Zadu6avam sA!";
    }

    public function breaks(): string
    {
        return "Brakes!";
    }

    function __toString()
    {
        return "{$this->model}/" . $this->breaks() . "/" . $this->gas() . "/{$this->driversName}";
    }
}