<?php
declare(strict_types = 1);

use MilitaryElite\App;
use MilitaryElite\Factories\SoldierFactory;
use MilitaryElite\Factories\ToolsFactory;

spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});

$soldiersFactory = new SoldierFactory();
$toolsFactory = new ToolsFactory();

$app = new App($soldiersFactory, $toolsFactory);
$app->run();