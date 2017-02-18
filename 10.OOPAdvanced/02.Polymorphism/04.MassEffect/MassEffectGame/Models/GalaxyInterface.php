<?php


namespace MassEffectGame\Models;


use MassEffectGame\Models\Ships\ShipInterface;

interface GalaxyInterface
{
    /**
     * @param ShipInterface $ship
     * @return void
     */
    public function addShip(ShipInterface $ship);

    /**
     * @param string $name
     * @return bool
     */
    public function shipExists(string $name): bool;

    /**
     * @param string $name
     * @return ShipInterface
     */
    public function getShipByName(string $name): ShipInterface;

    /**
     * @param string $name
     * @return StarSystemInterface
     */
    public function getStarSystemByName(string $name): StarSystemInterface;
}