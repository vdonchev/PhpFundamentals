<?php
declare(strict_types = 1);

$results = [];
while (true) {
    $command = trim(fgets(STDIN));
    if ($command === "finally") {
        break;
    }

    $args = [];
    $reflection = new ReflectionFunction($command);
    $argCount = $reflection->getNumberOfParameters();
    for ($i = 0; $i < $argCount; $i++) {
        $args[] = intval(trim(fgets(STDIN)));
    }

    try {
        $results[] = $command(...$args);
    } catch (Exception $ex) {
        echo "Caught exception: {$ex->getMessage()}\n";
    }
}

while (true) {
    $command = trim(fgets(STDIN));
    $reflection = new ReflectionFunction($command);
    $argCount = $reflection->getNumberOfParameters();
    $args = [];
    try {
        if ($argCount == 1) {
            for ($i = 0; $i < count($results); $i++) {
                $results[$i] = $command($results[$i]);
            }

            break;
        }

        while (count($results) >= $argCount) {
            $args = array_splice($results, 0, $argCount);
            $results[] = $command(...$args);
        }
    } catch (Exception $ex) {
        echo "Caught exception: {$ex->getMessage()}\n";
        array_splice($results, 0, 0, $args);
        continue;
    }

    break;
}

echo implode(", ", $results);

function sum($a, $b)
{
    return $a + $b;
}

function multiply($a, $b)
{
    return $a * $b;
}

function divide($a, $b)
{
    if ($b == 0) {
        throw new Exception("Division by zero.");
    }

    return $a / $b;
}

function subtract($a, $b)
{
    return $a - $b;
}

function factorial($a)
{
    $result = 1;
    for ($i = 1; $i <= $a; $i++) {
        $result *= $i;
    }

    return $result;
}

function root($a)
{
    if ($a < 0) {
        throw new Exception("Can't take the root of a negative number");
    }

    return sqrt($a);
}

function power($a, $b)
{
    return pow($a, $b);
}

function absolute($a)
{
    return abs($a);
}

function pythagorean($a, $b)
{
    return sqrt($a * $a + $b * $b);
}

function triangleArea($a, $b, $c)
{
    $s = ($a + $b + $c) / 2;
    $res = sqrt($s * ($s - $a) * ($s - $b) * ($s - $c));
    if (is_nan($res)) {
        throw new Exception("Can't take the root of a negative number");
    }

    return $res;
}

function quadratic($a, $b, $c)
{
    if ($a == 0) {
        throw new Exception("Division by zero.");
    }

    $discriminant = ($b * $b) - (4 * $a * $c);
    if ($discriminant < 0) {
        return 0;
    }

    $x1 = (-$b + sqrt($discriminant)) / (2 * $a);
    $x2 = (-$b - sqrt($discriminant)) / (2 * $a);

    if ($discriminant == 0) {
        return $x1;
    }

    return $x1 + $x2;
}