<?php


namespace MassEffectGame\Models\Enhancements;


use MassEffectGame\Models\Ships\ShipInterface;

interface EnhancementInterface
{
    /**
     * @param ShipInterface $ship
     * @return void
     */
    public function enhance(ShipInterface $ship);
}