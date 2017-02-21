<?php
declare(strict_types = 1);

use Telephony\SmartPhone;

require_once "Models/CallInterface.php";
require_once "Models/BrowseInterface.php";
require_once "Models/SmartPhone.php";

$phone = new SmartPhone();

$phoneNumbers = explode(" ", readLine());
$websites = explode(" ", readLine());

foreach ($phoneNumbers as $phoneNumber) {
    try {
        writeLine($phone->call($phoneNumber));
    } catch (Exception $ex) {
        writeLine($ex->getMessage());
    }
}

foreach ($websites as $website) {
    try {
        writeLine($phone->browse($website));
    } catch (Exception $ex) {
        writeLine($ex->getMessage());
    }
}

function readLine(): string
{
    return trim(fgets(STDIN));
}

/**
 * @param $content mixed
 * @return void
 */
function writeLine($content)
{
    echo $content . PHP_EOL;
}