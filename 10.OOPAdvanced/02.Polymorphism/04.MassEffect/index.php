<?php

use MassEffectGame\Game\GameEngine;
use MassEffectGame\IO\ConsoleIO;
use MassEffectGame\Models\Galaxy;

spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});

$galaxy = new Galaxy();
$io = new ConsoleIO();

$game = new GameEngine($galaxy, $io);
$game->run();