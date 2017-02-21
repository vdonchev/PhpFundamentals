<?php


namespace MilitaryElite\Models;


use MilitaryElite\Models\Contracts\EngineerInterface;
use MilitaryElite\Models\Contracts\RepairInterface;

class Engineer extends SpecialisedSoldier implements EngineerInterface
{
    /**
     * @var $repairs RepairInterface[]
     */
    private $repairs = [];

    public function addRepair(RepairInterface $repair)
    {
        $this->repairs[] = $repair;
    }

    public function getRepairs(): array
    {
        return $this->repairs;
    }
}