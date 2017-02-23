<?php
declare(strict_types = 1);
session_start();

define("CURRENCIES", ["usd" => "$", "eur" => "€", "bgn" => "lv."]);
define("DURATIONS", [6, 12, 24, 60]);

if (isset($_GET["submit"])) {
    array_map("trim", $_GET);

    $amount = filter_var($_GET["amount"], FILTER_VALIDATE_INT);
    if ($amount === false || $amount <= 0) {
        throw new Exception("Invalid amount supplied");
    }

    $currency = strtolower($_GET["currency"]);
    if (!array_key_exists($currency, CURRENCIES)) {
        throw new Exception("Invalid currency");
    }

    $interest = filter_var($_GET["interest"], FILTER_VALIDATE_INT);
    if ($interest === false || $interest <= 0) {
        throw new Exception("Invalid interest supplied");
    }

    $duration = strtoupper($_GET["duration"]);
    if (!in_array($duration, DURATIONS)) {
        throw new Exception("Invalid duration");
    }

    $amount = intval($amount);
    $currency = CURRENCIES[$currency];
    $interest = intval($interest);
    $duration = intval($duration);

    $compoundInterest = round(calculateCompoundInterest($amount, $interest, $duration), 2);
    $compoundInterest = number_format($compoundInterest, 2, ".", "");
}

function calculateCompoundInterest(int $amount, int $interest, int $duration): float
{
    $interestPerMonth = $interest / 12;
    for ($month = 0; $month < $duration; $month++) {
        $amount = $amount * (100 + $interestPerMonth) / 100;
    }

    return $amount;
}

require_once "view.php";