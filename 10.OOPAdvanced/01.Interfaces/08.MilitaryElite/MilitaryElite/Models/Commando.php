<?php


namespace MilitaryElite\Models;


use MilitaryElite\Models\Contracts\CommandoInterface;
use MilitaryElite\Models\Contracts\MissionInterface;

class Commando implements CommandoInterface
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
}