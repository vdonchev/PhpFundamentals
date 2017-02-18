<?php


namespace MassEffectGame\Models\Enhancements;


use MassEffectGame\Models\Ships\ShipInterface;

class ThanixCannonEnhancement implements EnhancementInterface
{
    const BONUS_VALUE = 50;

    /**
     * @param ShipInterface $ship
     */
    public function enhance(ShipInterface $ship)
    {
        $ship->setDamage($ship->getDamage() + self::BONUS_VALUE);
    }
}