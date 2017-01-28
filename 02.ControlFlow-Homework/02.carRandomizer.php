<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Randomize</title>

    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<form action="" method="POST">
    <label for="cars">Enter cars</label>
    <input type="text" name="cars" id="cars" required>
    <input type="submit" value="Show results">
</form>
<?php
if (isset($_POST) && !empty(trim($_POST['cars']))) {
    echo <<<HTML
<table>
    <thead>
    <tr>
        <th>Car</th>
        <th>Color</th>
        <th>Count</th>
    </tr>
    </thead>
    <tbody>
HTML;

    $cars = trim($_POST['cars']);
    $cars = array_map('trim', array_filter(explode(',', $cars)));
    foreach ($cars as $car) {
        $car = htmlentities($car);
        $color = generateRandomColor();
        $count = rand(1, 5);

        echo "<tr><td>{$car}</td><td>{$color}</td><td>{$count}</td></tr>";
    }
}
echo <<<HTML
</tbody>
</table>
HTML;
?>
</body>
</html>

<?php
function generateRandomColor()
{
    $colors = ['red', 'green', 'blue', 'magenta'];

    return $colors[rand(0, sizeof($colors) - 1)];
}