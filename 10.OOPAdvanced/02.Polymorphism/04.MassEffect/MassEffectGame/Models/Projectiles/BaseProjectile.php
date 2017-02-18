<?php


namespace MassEffectGame\Models\Projectiles;


abstract class BaseProjectile implements ProjectileInterface
{
    private $damage;

    /**
     * BaseProjectile constructor.
     * @param int $damage
     */
    public function __construct(int $damage)
    {
        $this->damage = $damage;
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }
}