<?php


namespace MassEffectGame\Models\Enhancements;


use MassEffectGame\Models\Ships\ShipInterface;

class KineticBarrierEnhancement implements EnhancementInterface
{
    const BONUS_VALUE = 100;

    /**
     * @param ShipInterface $ship
     */
    public function enhance(ShipInterface $ship)
    {
        $ship->setShields($ship->getShields() + self::BONUS_VALUE);
    }
}