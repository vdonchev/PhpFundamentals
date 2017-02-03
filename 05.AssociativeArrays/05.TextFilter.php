<?php
//$text = trim("It is not Linux, it is GNU/Linux. Linux is merely the kernel, while GNU adds the functionality. Therefore we owe it to them by calling the OS GNU/Linux! Sincerely, a Windows client");
//$bannedWords = explode(", ", trim(""));

$text = trim(fgets(STDIN));
$bannedWords = explode(", ", trim(fgets(STDIN)));
foreach ($bannedWords as $word) {
    $text = str_replace($word, str_repeat("*", strlen($word)), $text);
}

echo $text;