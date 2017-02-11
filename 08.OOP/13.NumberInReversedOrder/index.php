<?php
require_once 'DecimalNumber.php';

$decimal = new DecimalNumber(-1234.55);
var_dump($decimal->getNumberReversed());