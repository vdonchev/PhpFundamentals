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

    function __toString()
    {
        $output = parent::__toString() . PHP_EOL
            . "Repairs:" . PHP_EOL;

        foreach ($this->getRepairs() as $repair) {
            $output .= "  {$repair}" . PHP_EOL;
        }

        return trim($output);
    }
}