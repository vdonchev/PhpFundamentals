<?php
$letters = [];
$input = trim(fgets(STDIN));
foreach (str_split($input) as $ch) {
    if (!array_key_exists($ch, $letters))
        $letters[$ch] = 0;

    $letters[$ch]++;
}

arsort($letters, SORT_NUMERIC);

foreach ($letters as $ch => $occurrences) {
    echo "{$ch} -> {$occurrences}\n";
}