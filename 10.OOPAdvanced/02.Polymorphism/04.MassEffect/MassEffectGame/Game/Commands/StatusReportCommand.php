<?php


namespace MassEffectGame\Game\Commands;


use MassEffectGame\Game\GameEngineInterface;

class StatusReportCommand implements CommandInterface
{
    /**
     * @param GameEngineInterface $engine
     * @param array $params
     * @return string[]
     */
    public function execute(GameEngineInterface $engine, array $params)
    {
        $ship = $engine->getGalaxy()->getShipByName($params[0]);

        return $ship->getReport();
    }
}