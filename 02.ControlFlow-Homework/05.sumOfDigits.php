<form action="" method="post">
    <label for="numbers">Input string:</label>
    <input type="text" id="numbers" name="numbers" required>
    <input type="submit" value="Submit">
</form>
<?php
if (isset($_POST['numbers']) && !empty(trim($_POST['numbers']))) {
    $style = 'border: 1px solid black';
    $output = "<table style='{$style}'><tbody>";
    $numbers = array_map('trim', explode(',', trim($_POST['numbers'])));
    foreach ($numbers as $number) {
        if (!is_numeric($number)) {
            $output .= "<tr><td style='{$style}'>{$number}</td><td style='{$style}'>I cannot sum that</td></tr>";
        } else {
            $digitsSum = calculateDigitsSum($number);
            $output .= "<tr><td style='{$style}'>{$number}</td><td style='{$style}'>{$digitsSum}</td></tr>";
        }
    }

    $output .= "</tbody></table>";
    echo $output;
}

function calculateDigitsSum($number)
{
    $sum = 0;
    for ($ch = 0; $ch < strlen($number); $ch++) {
        $sum += intval($number[$ch]);
    }

    return $sum;
}