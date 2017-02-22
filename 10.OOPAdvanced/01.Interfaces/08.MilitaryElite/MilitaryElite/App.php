<?php


namespace MilitaryElite;


use MassEffectGame\Models\Projectiles\ProjectileInterface;
use MilitaryElite\Factories\SoldierFactory;
use MilitaryElite\Factories\ToolsFactory;
use MilitaryElite\Models\Contracts\CommandoInterface;
use MilitaryElite\Models\Contracts\EngineerInterface;
use MilitaryElite\Models\Contracts\LeutenantGeneralInterface;
use MilitaryElite\Models\Contracts\MissionInterface;
use MilitaryElite\Models\Contracts\PrivateSoldierInterface;
use MilitaryElite\Models\Contracts\RepairInterface;
use MilitaryElite\Models\Contracts\SoldierInterface;

class App
{
    private $soldierFactory;
    private $toolsFactory;

    /**
     * @var $soldiersById SoldierInterface[]
     */
    private $soldiersById = [];

    /**
     * @var $allSoldiers SoldierInterface[]
     */
    private $allSoldiers = [];

    public function __construct(SoldierFactory $soldierFactory, ToolsFactory $toolsFactory)
    {
        $this->soldierFactory = $soldierFactory;
        $this->toolsFactory = $toolsFactory;
    }

    public function run()
    {
        $this->readInput();
        $this->printSoldiers();
    }

    private function readInput()
    {
        while (true) {
            $data = explode(" ", $this->readLine());
            if ($data[0] === "End") {
                break;
            }

            try {
                $this->processCommand($data);
            } catch (\Exception $exception) {
                // todo
            }
        }
    }

    private function processCommand($args)
    {
        switch ($args[0]) {
            case "Private":
                $private = $this->soldierFactory->create($args);
                $this->addSoldier($private->getId(), $private);
                break;
            case "LeutenantGeneral":
                $general = $this->soldierFactory->create($args);
                $privateIds = array_map("intval", array_splice($args, 5));
                foreach ($privateIds as $privateId) {
                    $private = $this->getSoldierById($privateId);
                    $this->addPrivateToLieutenant($general, $private);
                }

                $this->addSoldier($general->getId(), $general);
                break;
            case "Engineer":
                $engineer = $this->soldierFactory->create($args);
                $repairData = array_splice($args, 6);
                for ($i = 0; $i < count($repairData); $i += 2) {
                    $repair = $this->toolsFactory->create("Repair", array_slice($repairData, $i, 2));
                    $this->addRepairToEngineer($engineer, $repair);
                }

                $this->addSoldier($engineer->getId(), $engineer);
                break;
            case "Commando":
                $commando = $this->soldierFactory->create($args);
                $missionsData = array_splice($args, 6);
                for ($i = 0; $i < count($missionsData); $i += 2) {
                    try {
                        $mission = $this->toolsFactory->create("Mission", array_slice($missionsData, $i, 2));
                        $this->addMissionToCommando($commando, $mission);
                    } catch (\Exception $exception) {
                    }
                }

                $this->addSoldier($commando->getId(), $commando);
                break;
            case "Spy":
                $spy = $this->soldierFactory->create($args);

                $this->addSoldier($spy->getId(), $spy);
                break;
        }
    }

    private function addRepairToEngineer(EngineerInterface $engineer, RepairInterface $repair)
    {
        $engineer->addRepair($repair);
    }

    private function addMissionToCommando(CommandoInterface $commando, MissionInterface $mission)
    {
        $commando->addMission($mission);
    }

    private function addPrivateToLieutenant(LeutenantGeneralInterface $general, SoldierInterface $soldier)
    {
        $general->addPrivate($soldier);
    }

    private function addSoldier(int $id, SoldierInterface $soldier)
    {
        $this->soldiersById[$id] = $soldier;
        $this->allSoldiers[] = $soldier;
    }

    private function getSoldierById(int $id)
    {
        return $this->soldiersById[$id];
    }

    private function printSoldiers()
    {
        foreach ($this->allSoldiers as $soldier) {
            $this->writeLine($soldier);
        }
    }

    private function readLine(): string
    {
        return trim(fgets(STDIN));
    }

    /**
     * @param $content mixed
     * @return void
     */
    private function writeLine($content)
    {
        echo $content . PHP_EOL;
    }
}