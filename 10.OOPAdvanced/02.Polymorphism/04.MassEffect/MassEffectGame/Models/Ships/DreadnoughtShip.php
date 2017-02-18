<?php


namespace MassEffectGame\Models\Ships;


use MassEffectGame\Models\Projectiles\ProjectileInterface;

class DreadnoughtShip extends BaseShip
{
    const TYPE = "Dreadnought";
    const HEALTH = 200;
    const SHIELDS = 300;
    const DAMAGE = 150;
    const FUEL = 700.;

    const PROJECTILE_TYPE = "Laser";

    public function __construct($name)
    {
        parent::__construct(
            self::TYPE,
            $name,
            self::HEALTH,
            self::SHIELDS,
            self::DAMAGE,
            self::FUEL,
            self::PROJECTILE_TYPE);
    }

    public function getProjectileDamage(): int
    {
        return $this->getDamage() + floor($this->getShields() / 2);
    }

    public function takeDamage(ProjectileInterface $projectile)
    {
        $this->setShields($this->getShields() + 50);
        $projectile->doDamage($this);
        $this->setShields(max($this->getShields() - 50, 0));
    }
}