<?php
/**
 * Example bellow is using hardcoded date, so we can test if the application works as expected.
 * Simply change line 11 to:
 * $now = getdate()[0];
 * and you can test with your current date.
 */

date_default_timezone_set("UTC");

$now = strtotime('12-08-2014 11:08:47');
$year = date('Y', $now);
$newYear = strtotime("31-12-{$year} 23:59:59");

$diff = $newYear - $now;

echo 'Hours until new year : ' . number_format(floor($diff / 60 / 60), 0, '.', '') . '<br>';
echo 'Minutes until new year : ' . number_format(floor($diff / 60), 0, '.', ' ') . '<br>';
echo 'Seconds until new year : ' . number_format($diff, 0, '.', ' ') . '<br>';

$days = floor($diff / 60 / 60 / 24);
$hours = floor($diff / 60 / 60) % $days;
$minutes = floor($diff / 60) % 60;
$seconds = $diff % 60;
echo "Days:Hours:Minutes:Seconds {$days}:{$hours}:{$minutes}:{$seconds}";
