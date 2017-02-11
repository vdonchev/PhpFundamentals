<?php

namespace GoogleApp\Models;

class Pokemon
{
    private $name;
    private $type;

    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function __toString(): string
    {
        return "{$this->name} {$this->type}";
    }
}