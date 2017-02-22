<?php


namespace MilitaryElite\Models;


use MilitaryElite\Models\Contracts\CommandoInterface;
use MilitaryElite\Models\Contracts\MissionInterface;

class Commando extends SpecialisedSoldier implements CommandoInterface
{
    /**
     * @var $missions MissionInterface[]
     */
    private $missions = [];

    public function addMission(MissionInterface $mission)
    {
        $this->missions[] = $mission;
    }

    public function getMissions(): array
    {
        return $this->missions;
    }

    function __toString()
    {
        $output = parent::__toString() . PHP_EOL
            . "Missions:" . PHP_EOL;

        foreach ($this->getMissions() as $mission) {
            $output .= "  {$mission}" . PHP_EOL;
        }

        return trim($output);
    }
}