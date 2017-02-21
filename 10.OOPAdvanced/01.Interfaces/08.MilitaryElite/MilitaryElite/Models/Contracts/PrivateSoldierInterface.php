<?php


namespace MilitaryElite\Models\Contracts;


interface PrivateSoldierInterface
{
    public function setSalary(float $salary);

    public function getSalary(): float;
}