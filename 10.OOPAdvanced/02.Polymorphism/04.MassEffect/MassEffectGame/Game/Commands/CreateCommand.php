<?php


namespace MassEffectGame\Game\Commands;


use MassEffectGame\Exceptions\GameException;
use MassEffectGame\Factories\EnhancementFactory;
use MassEffectGame\Factories\ShipFactory;
use MassEffectGame\Game\GameEngineInterface;
use MassEffectGame\Helpers\Messages;

class CreateCommand implements CommandInterface
{
    /**
     * @param GameEngineInterface $engine
     * @param array $params
     * @return string[]
     * @throws GameException
     */
    public function execute(GameEngineInterface $engine, array $params)
    {
        $shipType = array_shift($params);
        $shipName = array_shift($params);

        if ($engine->getGalaxy()->shipExists($shipName)) {
            throw new GameException(Messages::SHIP_ALREADY_EXISTS);
        }

        $starSystem = $engine->getGalaxy()->getStarSystemByName(array_shift($params));
        $enhancements = $params;

        $ship = ShipFactory::produce($shipType, $shipName);

        foreach ($enhancements as $enhancementType) {
            $enhancement = EnhancementFactory::produce($enhancementType);
            $ship->addEnhancement($enhancementType, $enhancement);
        }

        $engine->getGalaxy()->addShip($ship);
        $starSystem->addShip($ship);

        return ["Created {$shipType} {$shipName}"];
    }
}