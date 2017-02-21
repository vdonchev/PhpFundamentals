<?php


namespace MilitaryElite\Models\Contracts;


interface MissionInterface
{
    public function getCodeName(): string;

    public function setCodeName(string $name);

    public function getState(): string;

    public function setState(string $state);

    public function completeMission();
}