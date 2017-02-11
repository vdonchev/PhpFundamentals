<?php

namespace RawData\Models;

class Cargo
{
    private $weight;
    private $type;

    public function __construct(int $weight, string $type)
    {
        $this->weight = $weight;
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }
}