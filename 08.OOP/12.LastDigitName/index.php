<?php
require_once 'Number.php';

$number = new Number(intval(fgets(STDIN)));
echo $number->getLastDigitName();