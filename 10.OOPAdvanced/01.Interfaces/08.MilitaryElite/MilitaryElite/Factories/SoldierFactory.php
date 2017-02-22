<?php


namespace MilitaryElite\Factories;


use MilitaryElite\Models\Commando;
use MilitaryElite\Models\Contracts\SoldierInterface;
use MilitaryElite\Models\Engineer;
use MilitaryElite\Models\LeutenantGeneral;
use MilitaryElite\Models\PrivateSoldier;
use MilitaryElite\Models\Spy;

class SoldierFactory
{
    public function create(array $params)
    {
        $type = array_shift($params);

        switch ($type) {
            case "Private":
                return new PrivateSoldier(intval($params[0]), $params[1], $params[2], floatval($params[3]));
            case "LeutenantGeneral":
                return new LeutenantGeneral(intval($params[0]), $params[1], $params[2], floatval($params[3]));
            case "Engineer":
                return new Engineer(intval($params[0]), $params[1], $params[2], floatval($params[3]), $params[4]);
            case "Commando":
                return new Commando(intval($params[0]), $params[1], $params[2], floatval($params[3]), $params[4]);
            case "Spy":
                return new Spy(intval($params[0]), $params[1], $params[2], floatval($params[3]), $params[4]);
            default:
                throw new \Exception("Invalid soldier type.");
        }
    }
}