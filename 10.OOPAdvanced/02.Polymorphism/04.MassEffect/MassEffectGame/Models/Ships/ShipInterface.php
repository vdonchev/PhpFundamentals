<?php


namespace MassEffectGame\Models\Ships;


use MassEffectGame\Models\Enhancements\EnhancementInterface;
use MassEffectGame\Models\Projectiles\ProjectileInterface;
use MassEffectGame\Models\StarSystemInterface;

interface ShipInterface
{
    /**
     * @return StarSystemInterface
     */
    public function getStarSystem(): StarSystemInterface;

    /**
     * @param StarSystemInterface $starSystem
     * @return void
     */
    public function setStarSystem(StarSystemInterface $starSystem);

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return int
     */
    public function getDamage(): int;

    /**
     * @param int $value
     * @return void
     */
    public function setDamage(int $value);

    /**
     * @return int
     */
    public function getHealth(): int;

    /**
     * @param int $value
     * @return void
     */
    public function setHealth(int $value);

    /**
     * @return int
     */
    public function getShields(): int;

    /**
     * @param int $value
     * @return void
     */
    public function setShields(int $value);

    /**
     * @return float
     */
    public function getFuel(): float;

    /**
     * @param int $value
     * @return void
     */
    public function setFuel(int $value);

    /**
     * @return string
     */
    public function getProjectileType(): string;

    /**
     * @return int
     */
    public function getProjectileDamage(): int;

    /**
     * @return void
     */
    public function increaseProjectilesFired();

    /**
     * @return bool
     */
    public function isDestroyed(): bool;

    /**
     * @param string $name
     * @param EnhancementInterface $enhancement
     * @return void
     */
    public function addEnhancement(string $name, EnhancementInterface $enhancement);

    /**
     * @param ProjectileInterface $projectile
     * @return void
     */
    public function takeDamage(ProjectileInterface $projectile);

    /**
     * @param StarSystemInterface $to
     * @return void
     */
    public function plotJumpTo(StarSystemInterface $to);

    /**
     * @return string[]
     */
    public function getReport(): array;
}