<?php
$text = trim(fgets(STDIN));
echo preg_replace_callback("/<a href=\"([^\"]+)\">(.*?)<\\/a>/", function($m) {
    return "[URL={$m[1]}]{$m[2]}[/URL]";
}, $text);