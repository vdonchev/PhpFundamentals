<?php


namespace MassEffectGame\Factories;


use MassEffectGame\Exceptions\GameException;
use MassEffectGame\Helpers\Messages;
use MassEffectGame\Models\Ships\CruiserShip;
use MassEffectGame\Models\Ships\DreadnoughtShip;
use MassEffectGame\Models\Ships\FrigateShip;
use MassEffectGame\Models\Ships\ShipInterface;

class ShipFactory
{
    /**
     * ShipFactory constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param $shipType
     * @param $name
     * @return ShipInterface
     * @throws GameException
     */
    public static function produce($shipType, $name): ShipInterface
    {
        switch ($shipType) {
            case "Frigate":
                return new FrigateShip($name);
            case "Cruiser":
                return new CruiserShip($name);
            case "Dreadnought":
                return new DreadnoughtShip($name);
            default:
                throw new GameException(Messages::INVALID_SHIP_TYPE);
        }
    }
}