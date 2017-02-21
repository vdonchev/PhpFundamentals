<?php


namespace MilitaryElite\Factories;


use MilitaryElite\Models\Mission;

class ToolsFactory
{
    public function create($params)
    {
        return new Mission();
    }
}