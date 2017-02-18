<?php


namespace MassEffectGame\Models\Projectiles;


use MassEffectGame\Models\Ships\ShipInterface;

interface ProjectileInterface
{
    /**
     * @return int
     */
    public function getDamage(): int;

    /**
     * @param ShipInterface $targetShip
     * @return void
     */
    public function doDamage(ShipInterface $targetShip);
}