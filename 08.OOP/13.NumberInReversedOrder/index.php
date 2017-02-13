<?php
require_once 'DecimalNumber.php';

$decimal = new DecimalNumber(trim(fgets(STDIN)));
var_dump($decimal->getNumberReversed());