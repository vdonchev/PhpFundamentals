<?php
use Racing\App;

spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});

$app = new App();
$app->start();