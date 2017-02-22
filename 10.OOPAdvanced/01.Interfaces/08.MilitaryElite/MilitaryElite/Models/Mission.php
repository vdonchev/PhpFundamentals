<?php


namespace MilitaryElite\Models;


use MilitaryElite\Models\Contracts\MissionInterface;

class Mission implements MissionInterface
{
    const VALID_STATES = ["Finished", "inProgress"];

    private $codeName;
    private $state;

    public function __construct(string $codeName, string $state)
    {
        $this->setCodeName($codeName);
        $this->setState($state);
    }

    public function getCodeName(): string
    {
        return $this->codeName;
    }

    public function setCodeName(string $name)
    {
        $this->codeName = $name;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state)
    {
        if (!in_array($state, self::VALID_STATES)) {
            throw new \Exception("Invalid mission state supplied");
        }

        $this->state = $state;
    }

    public function completeMission()
    {
        $this->setState("Finished");
    }

    function __toString()
    {
        return "Code Name: {$this->getCodeName()} State: {$this->getState()}";
    }
}