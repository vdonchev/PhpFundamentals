<?php
$text = trim(fgets(STDIN));
$text = str_replace("<a href=\"", "[URL=", $text);
$text = str_replace("\">", "]", $text);
$text = str_replace("</a>", "[/URL]", $text);

echo $text;