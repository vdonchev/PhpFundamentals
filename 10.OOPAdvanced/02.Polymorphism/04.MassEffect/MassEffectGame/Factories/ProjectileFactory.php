<?php


namespace MassEffectGame\Factories;


use MassEffectGame\Exceptions\GameException;
use MassEffectGame\Helpers\Messages;
use MassEffectGame\Models\Projectiles\Laser;
use MassEffectGame\Models\Projectiles\PenetrationShell;
use MassEffectGame\Models\Projectiles\ProjectileInterface;
use MassEffectGame\Models\Projectiles\ShieldReaver;

class ProjectileFactory
{
    /**
     * ProjectileFactory constructor.
     */
    private function __construct()
    {
    }

    /**
     * @param string $type
     * @param int $damage
     * @return ProjectileInterface
     * @throws GameException
     */
    public static function produce(string $type, int $damage): ProjectileInterface
    {
        switch ($type) {
            case "PenetrationShell":
                return new PenetrationShell($damage);
            case "ShieldReaver":
                return new ShieldReaver($damage);
            case "Laser":
                return new Laser($damage);
            default:
                throw new GameException(Messages::INVALID_PROJECTILE_TYPE);
        }
    }
}