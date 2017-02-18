<?php


namespace MassEffectGame\Models;


use MassEffectGame\Factories\StarSystemFactory;
use MassEffectGame\Models\Ships\ShipInterface;

class Galaxy implements GalaxyInterface
{
    /**
     * @var StarSystemInterface[]
     */
    private $starSystems;

    /**
     * @var ShipInterface[]
     */
    private $ships = [];

    public function __construct()
    {
        $this->createStarSystems();
    }

    /**
     * @param ShipInterface $ship
     */
    public function addShip(ShipInterface $ship)
    {
        $this->ships[$ship->getName()] = $ship;
    }

    /**
     * @param string $name
     * @return StarSystemInterface
     */
    public function getStarSystemByName(string $name): StarSystemInterface
    {
        return $this->starSystems[$name];
    }

    private function createStarSystems()
    {
        $starSystemNames = ["Artemis-Tau", "Serpent-Nebula", "Hades-Gamma", "Kepler-Verge"];

        foreach ($starSystemNames as $starSystemName) {
            $this->starSystems[$starSystemName] = StarSystemFactory::produce($starSystemName);
        }
    }

    /**
     * @param string $name
     * @return ShipInterface
     */
    public function getShipByName(string $name): ShipInterface
    {
        return $this->ships[$name];
    }

    /**
     * @param string $name
     * @return bool
     */
    public function shipExists(string $name): bool
    {
        return array_key_exists($name, $this->ships);
    }
}