<?php
$arr = array_filter(array_map('trim', explode(' ', fgets(STDIN))));
$longest = 0;
$startIndex = -1;

for ($i = 0; $i < count($arr); $i++) {
    $currentCount = 1;
    for ($k = $i + 1; $k < count($arr); $k++) {
        if ($arr[$k] == $arr[$i]) {
            $currentCount++;
        } else {
            break;
        }
    }

    if ($currentCount > $longest) {
        $longest = $currentCount;
        $startIndex = $i;
    }
}

echo implode(' ', array_fill(0, $longest, $arr[$startIndex]));