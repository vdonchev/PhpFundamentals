<form action="">
    <div>
        <textarea name="input" id="input" cols="30" rows="3" title="input"></textarea>
    </div>
    <div>
        <input type="submit" value="Color text">
    </div>
</form>
<?php
if (isset($_GET["input"]) && !empty(trim($_GET["input"]))) {
    $text = trim($_GET["input"]);
    for ($ch = 0; $ch < strlen($text); $ch++) {
        if (!empty(trim($text[$ch]))) {
            $letter = colorize($text[$ch]);
            echo "{$letter}";
        }
    }
}

function colorize($item) {
    $color = ord($item) % 2 == 0 ? "red" : "blue";

    // <font> is deprecated HTML element, do not use it in real projects!
    return "<font color='{$color}'>{$item} </font>";
}