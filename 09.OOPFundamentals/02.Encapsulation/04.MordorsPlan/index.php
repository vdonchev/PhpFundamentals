<?php
declare(strict_types = 1);

use GandalfApp\App;
use GandalfApp\Models\Mood;
use GandalfApp\Models\Wizard;

spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});

$mood = new Mood();
$wizard = new Wizard($mood);

$radio = new App($wizard);
$radio->start();