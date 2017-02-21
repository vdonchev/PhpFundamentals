<?php


namespace MilitaryElite\Models\Contracts;


interface SoldierInterface
{
    public function setId(int $id);

    public function getId(): int;

    public function setFirstName(string $name);

    public function getFirstName(): string;

    public function setLastName(string $name);

    public function getLastName(): string;
}