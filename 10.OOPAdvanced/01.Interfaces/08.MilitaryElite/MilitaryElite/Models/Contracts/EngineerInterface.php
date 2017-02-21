<?php


namespace MilitaryElite\Models\Contracts;


interface EngineerInterface
{
    public function addRepair(RepairInterface $repair);

    public function getRepairs(): array;
}