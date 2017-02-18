<?php


namespace MassEffectGame\Game;


use MassEffectGame\Models\GalaxyInterface;

interface GameEngineInterface
{
    /**
     * @return void
     */
    public function run();

    /**
     * @return GalaxyInterface
     */
    public function getGalaxy(): GalaxyInterface;
}