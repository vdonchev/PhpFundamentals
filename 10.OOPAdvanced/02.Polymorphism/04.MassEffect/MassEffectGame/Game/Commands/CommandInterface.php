<?php


namespace MassEffectGame\Game\Commands;


use MassEffectGame\Game\GameEngineInterface;


interface CommandInterface
{
    /**
     * @param GameEngineInterface $engine
     * @param array $params
     * @return mixed
     */
    public function execute(GameEngineInterface $engine, array $params);
}