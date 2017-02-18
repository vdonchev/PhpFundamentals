<?php


namespace MassEffectGame\Game\Commands;


use MassEffectGame\Exceptions\GameException;
use MassEffectGame\Game\GameEngineInterface;
use MassEffectGame\Helpers\Messages;

class PlotJumpCommand implements CommandInterface
{
    /**
     * @param GameEngineInterface $engine
     * @param array $params
     * @return string[]
     * @throws GameException
     */
    public function execute(GameEngineInterface $engine, array $params)
    {
        $ship = $engine->getGalaxy()->getShipByName($params[0]);
        $destination = $engine->getGalaxy()->getStarSystemByName($params[1]);

        if ($ship->isDestroyed()) {
            throw new GameException(Messages::SHIP_IS_DESTROYED);
        }

        if ($ship->getStarSystem()->getName() === $destination->getName()) {
            throw new GameException(Messages::SHIP_ALREADY_IN_SAME_SYSTEM . $destination->getName());
        }

        if (!array_key_exists($destination->getName(), $ship->getStarSystem()->getNeighbours())) {
            throw new GameException("Cannot travel directly from {$ship->getStarSystem()->getName()} to {$destination->getName()}");
        }

        if ($ship->getFuel() < $ship->getStarSystem()->getNeighbours()[$destination->getName()]) {
            throw new GameException("Not enough fuel to travel to {$destination->getName()} - {$ship->getFuel()}/{$ship->getStarSystem()->getNeighbours()[$destination->getName()]}");
        }

        $prev = $ship->getStarSystem()->getName();
        $ship->plotJumpTo($destination);

        return ["{$ship->getName()} jumped from {$prev} to {$destination->getName()}"];
    }
}