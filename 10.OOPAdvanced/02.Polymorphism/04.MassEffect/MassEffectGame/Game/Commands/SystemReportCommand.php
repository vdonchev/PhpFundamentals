<?php


namespace MassEffectGame\Game\Commands;


use MassEffectGame\Game\GameEngineInterface;
use MassEffectGame\Models\Ships\ShipInterface;

class SystemReportCommand implements CommandInterface
{
    /**
     * @param GameEngineInterface $engine
     * @param array $params
     * @return string[]
     */
    public function execute(GameEngineInterface $engine, array $params)
    {
        $starName = $params[0];
        $starSystem = $engine->getGalaxy()->getStarSystemByName($starName);

        $aliveShips = array_filter($starSystem->getShips(), function (ShipInterface $ship) {
            return !$ship->isDestroyed();
        });

        usort($aliveShips, function (ShipInterface $shipA, ShipInterface $shipB) {
            $res = $shipB->getHealth() <=> $shipA->getHealth();
            if ($res === 0) {
                $res = $shipB->getShields() <=> $shipA->getShields();
            }

            return $res;
        });

        $deadShips = array_filter($starSystem->getShips(), function (ShipInterface $ship) {
            return $ship->isDestroyed();
        });

        usort($deadShips, function (ShipInterface $shipA, ShipInterface $shipB) {
            return $shipA->getName() <=> $shipB->getName();
        });

        $output = ["Intact ships:"];
        if (count($aliveShips) <= 0) {
            $output[] = "N/A";
        } else {
            /**
             * @var $ship ShipInterface
             */
            foreach ($aliveShips as $ship) {
                array_push($output, ...$ship->getReport());
            }
        }

        $output[] = "Destroyed ships:";
        if (count($deadShips) <= 0) {
            $output[] = "N/A";
        } else {
            /**
             * @var $ship ShipInterface
             */
            foreach ($deadShips as $ship) {
                array_push($output, ...$ship->getReport());
            }
        }

        return $output;
    }
}