<?php
declare(strict_types = 1);

$word = trim(fgets(STDIN));
echo isPalindrome($word) ? "true" : "false";

function isPalindrome(string $word): bool
{
    return $word === strrev($word);
}