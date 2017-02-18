<?php


namespace MassEffectGame\Models\Enhancements;


use MassEffectGame\Models\Ships\ShipInterface;

class ExtendedFuelCellsEnhancement implements EnhancementInterface
{
    const BONUS_VALUE = 200.;

    /**
     * @param ShipInterface $ship
     */
    public function enhance(ShipInterface $ship)
    {
        $ship->setFuel($ship->getFuel() + self::BONUS_VALUE);
    }
}