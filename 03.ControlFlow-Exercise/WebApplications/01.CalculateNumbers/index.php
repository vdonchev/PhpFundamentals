<?php
if (isset($_GET['numA']) && !empty(trim($_GET['numA'])) &&
    isset($_GET['numB']) && !empty(trim($_GET['numB'])) &&
    isset($_GET['operation']) && !empty(trim($_GET['operation']))
) {
    if (is_numeric(trim($_GET['numA'])) && is_numeric(trim($_GET['numB']))) {
        $operation = trim($_GET['operation']);
        $numA = intval(trim($_GET['numA']));
        $numB = intval(trim($_GET['numB']));

        $result = 0;
        switch ($operation) {
            case 'sum':
                $result = $numA + $numB;
                break;
            case 'subtract':
                $result = $numA - $numB;
                break;
            default:
                echo 'Wrong operation supplied!';
                break;
        }
    }
}

include 'frontend.php';