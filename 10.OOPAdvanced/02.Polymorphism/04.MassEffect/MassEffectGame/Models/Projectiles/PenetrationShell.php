<?php


namespace MassEffectGame\Models\Projectiles;


use MassEffectGame\Models\Ships\ShipInterface;

class PenetrationShell extends BaseProjectile
{
    /**
     * @param ShipInterface $targetShip
     */
    public function doDamage(ShipInterface $targetShip)
    {
        $newHealth = $targetShip->getHealth() - $this->getDamage();
        $newHealth = max(0, $newHealth);

        $targetShip->setHealth($newHealth);
    }
}