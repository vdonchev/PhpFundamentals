<?php


namespace MilitaryElite\Factories;


use MilitaryElite\Models\Mission;
use MilitaryElite\Models\Repair;

class ToolsFactory
{
    public function create(string $type, array $params)
    {
        switch ($type) {
            case "Repair":
                return new Repair($params[0], intval($params[1]));
            case "Mission":
                return new Mission(...$params);
            default:
                throw new \Exception("Invalid type supplied");
        }
    }
}