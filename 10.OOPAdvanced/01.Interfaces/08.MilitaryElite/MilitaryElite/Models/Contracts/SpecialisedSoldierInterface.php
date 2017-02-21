<?php


namespace MilitaryElite\Models\Contracts;


interface SpecialisedSoldierInterface
{
    public function setCorps(string $corps);

    public function getCorps(): string;
}