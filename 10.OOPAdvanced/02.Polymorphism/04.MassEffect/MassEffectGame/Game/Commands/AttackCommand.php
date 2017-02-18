<?php


namespace MassEffectGame\Game\Commands;


use MassEffectGame\Exceptions\GameException;
use MassEffectGame\Factories\ProjectileFactory;
use MassEffectGame\Game\GameEngineInterface;
use MassEffectGame\Helpers\Messages;

class AttackCommand implements CommandInterface
{
    /**
     * @param GameEngineInterface $engine
     * @param array $params
     * @return string[]
     * @throws GameException
     */
    public function execute(GameEngineInterface $engine, array $params)
    {
        $attacker = $engine->getGalaxy()->getShipByName($params[0]);
        $target = $engine->getGalaxy()->getShipByName($params[1]);

        if ($attacker->isDestroyed() || $target->isDestroyed()) {
            throw new GameException(Messages::SHIP_IS_DESTROYED);
        }

        if ($attacker->getStarSystem() !== $target->getStarSystem()) {
            throw new GameException(Messages::SHIP_NOT_IN_SAME_SYSTEM);
        }

        $projectile = ProjectileFactory::produce($attacker->getProjectileType(), $attacker->getProjectileDamage());
        $attacker->increaseProjectilesFired();
        $target->takeDamage($projectile);

        $output = ["{$attacker->getName()} attacked {$target->getName()}"];

        if ($target->isDestroyed()) {
            $output[] = "{$target->getName()} has been destroyed";
        }

        return $output;
    }
}