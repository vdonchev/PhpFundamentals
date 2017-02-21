<?php

namespace BirthDayCelebrations;

class Robot implements IdentifiableInterface
{
    private $id;
    private $model;

    public function __construct(string $model, string $id)
    {
        $this->model = $model;
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }
}