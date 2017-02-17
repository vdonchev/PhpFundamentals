<?php
declare(strict_types = 1);

use RadioApp\App;

spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});

$radio = new App();
$radio->start();