<?php


namespace MassEffectGame\Models\Ships;


class CruiserShip extends BaseShip
{
    const TYPE = "Cruiser";
    const HEALTH = 100;
    const SHIELDS = 100;
    const DAMAGE = 50;
    const FUEL = 300.;

    const PROJECTILE_TYPE = "PenetrationShell";

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