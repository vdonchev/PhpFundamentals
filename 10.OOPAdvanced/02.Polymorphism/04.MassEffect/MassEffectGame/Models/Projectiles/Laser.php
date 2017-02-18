<?php


namespace MassEffectGame\Models\Projectiles;


use MassEffectGame\Models\Ships\ShipInterface;

class Laser extends BaseProjectile
{
    /**
     * @param ShipInterface $targetShip
     */
    public function doDamage(ShipInterface $targetShip)
    {
        $a = $this->getDamage() - $targetShip->getShields();

        $newShields = $targetShip->getShields() - $this->getDamage();
        $newShields = max(0, $newShields);
        $targetShip->setShields($newShields);

        $leftoverDamage = max(0, $a);
        $newHealth = $targetShip->getHealth() - $leftoverDamage;
        $newHealth = max(0, $newHealth);

        $targetShip->setHealth($newHealth);
    }
}