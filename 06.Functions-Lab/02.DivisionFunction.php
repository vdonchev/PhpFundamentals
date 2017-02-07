<?php
$numToDiveTo = trim(fgets(STDIN));

try {
    echo division($numToDiveTo) . "\n";
} catch (Exception $e) {
    echo "Caught exception: " . $e->getMessage() . "\n";
} finally {
    echo "Finally is always executed";
}

function division($num): float
{
    if (!is_numeric($num)) {
        throw new Exception("Wrong type");
    }

    if ($num == 0) {
        throw new Exception("Division by zero.");
    }

    return 1 / $num;
}