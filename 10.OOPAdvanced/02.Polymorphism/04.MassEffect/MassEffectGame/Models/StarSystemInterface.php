<?php


namespace MassEffectGame\Models;


use MassEffectGame\Models\Ships\ShipInterface;

interface StarSystemInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return array
     */
    public function getNeighbours(): array;

    /**
     * @return array
     */
    public function getShips(): array;

    /**
     * @param ShipInterface $ship
     * @return mixed
     */
    public function addShip(ShipInterface $ship);

    /**
     * @param string $shipName
     * @return mixed
     */
    public function removeShip(string $shipName);
}