<?php
require_once 'DateModifier.php';

$dateA = trim(fgets(STDIN));
$dateB = trim(fgets(STDIN));

echo DateModifier::getDateDifference($dateA, $dateB);