<?php


namespace MilitaryElite\Models\Contracts;


interface CommandoInterface
{
    public function addMission(MissionInterface $mission);

    public function getMissions(): array;
}