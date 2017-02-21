<?php


namespace MilitaryElite\Factories;


use MilitaryElite\Models\PrivateSoldier;

class SoldierFactory
{
    public function create($params)
    {
        return new PrivateSoldier();
    }
}