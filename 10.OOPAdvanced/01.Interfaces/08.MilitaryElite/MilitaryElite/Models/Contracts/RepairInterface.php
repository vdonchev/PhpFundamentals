<?php


namespace MilitaryElite\Models\Contracts;


interface RepairInterface
{
    public function getName(): string;

    public function setName(string $name);

    public function getWorkHours(): int;

    public function setWorkHours(int $hours);
}