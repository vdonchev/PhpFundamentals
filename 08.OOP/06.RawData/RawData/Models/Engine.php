<?php

namespace RawData\Models;

class Engine
{
    private $speed;
    private $power;

    public function __construct(int $speed, int $power)
    {
        $this->speed = $speed;
        $this->power = $power;
    }

    public function getPower(): int
    {
        return $this->power;
    }
}