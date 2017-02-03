<form action="">
    <div>
        <textarea name="input" id="input" cols="30" rows="3" title="input"></textarea>
    </div>
    <div>
        <input type="submit" value="Count words">
    </div>
</form>
<?php
if (isset($_GET["input"]) && !empty(trim($_GET["input"]))) {
    $text = trim($_GET["input"]);
    preg_match_all("/[a-zA-Z]+/", $text, $words);
    $words = array_map("strtolower", $words[0]);

    $wordsCount = [];
    foreach ($words as $word) {
        if (!array_key_exists($word, $wordsCount)) {
            $wordsCount[$word] = 0;
        }

        $wordsCount[$word]++;
    }

    echo buildTable($wordsCount);
}

function buildTable($items) {
    $output = "<table border='2'>";
    foreach ($items as $key => $val) {
        $output .= "<tr><td>{$key}</td><td>{$val}</td></tr>";
    }

    $output .= "</table>";

    return $output;
}