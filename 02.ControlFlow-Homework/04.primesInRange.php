<form action="" method="post">
    <label for="start">Starting index:</label>
    <input type="number" name="start" id="start" required>
    <label for="end">End:</label>
    <input type="number" name="end" id="end" required>
    <input type="submit" value="Submit">
</form>
<?php
if (isset($_POST['start']) && isset($_POST['end']) &&
    !empty(trim($_POST['start'])) && !empty(trim($_POST['end'])) &&
    is_numeric($_POST['start']) && is_numeric($_POST['end']) &&
    intval($_POST['start']) < intval($_POST['end'])
) {
    $start = intval($_POST['start']);
    $end = intval($_POST['end']);

    $output = '';
    for ($num = $start; $num <= $end; $num++) {
        if ($num > 1 && isPrime($num)) {
            $output .= "<strong>{$num}</strong>, ";
        } else {
            $output .= "{$num}, ";
        }
    }

    $output = rtrim($output, ', ');
    echo $output;
}

function isPrime($num)
{
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }

    return true;
}
