<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Annual Expenses</title>

    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<form action="" method="post">
    <label for="years">Enter number of years:</label>
    <input type="number" id="years" name="years" required>
    <input type="submit" value="Show costs">
</form>
</body>
</html>

<?php
if (isset($_POST['years']) && is_numeric($_POST['years'])) {
    $years = intval(trim($_POST['years']));
    $currentYear = date('Y');
    $output = <<<HTML
<hr>
<table>
    <thead>
    <tr>
        <th>Year</th>
        <th>January</th>
        <th>February</th>
        <th>March</th>
        <th>April</th>
        <th>May</th>
        <th>June</th>
        <th>July</th>
        <th>August</th>
        <th>September</th>
        <th>October</th>
        <th>November</th>
        <th>December</th>
        <th>Total:</th>
    </tr>
    </thead>
    <tbody>
HTML;

    for ($i = 0; $i < $years; $i++) {
        $output .= "<tr><td>${currentYear}</td>";
        $totalYearExpense = 0;
        for ($j = 0; $j < 12; $j++) {
            $expense = getRandomSum();
            $totalYearExpense += $expense;
            $output .= "<td>{$expense}</td>";
        }

        $output .= "<td>${totalYearExpense}</td></tr>";
        $currentYear--;
    }

    $output .= <<<HTML
    </tbody>
</table>
HTML;

echo $output;

}

function getRandomSum()
{
    return rand(0, 999);
}
