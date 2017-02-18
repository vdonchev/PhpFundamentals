<?php


namespace MassEffectGame\Models\Ships;


class FrigateShip extends BaseShip
{
    const TYPE = "Frigate";
    const HEALTH = 60;
    const SHIELDS = 50;
    const DAMAGE = 30;
    const FUEL = 220.;

    const PROJECTILE_TYPE = "ShieldReaver";

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
        return $this->getDamage();
    }
}