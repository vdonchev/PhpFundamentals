<?php
list($text, $word) = [trim(fgets(STDIN)), trim(fgets(STDIN))];
preg_match_all("/([^.?!]*\\b" . $word . "\\b[^.?!]*[.?!])/", $text, $res);
echo implode("\n", $res[0]);