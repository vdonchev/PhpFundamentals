<?php
require_once "Fibonacci.php";

$start = intval(trim(fgets(STDIN)));
$end = intval(trim(fgets(STDIN)));

$fib = new Fibonacci($end);
echo implode(", ", $fib->getFibonacciRange($start, $end));
