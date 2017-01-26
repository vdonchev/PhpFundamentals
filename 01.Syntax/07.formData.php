<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form data</title>
</head>
<body>
<form action="" method="GET">
    <table>
        <tr>
            <td><input type="text" name="name" required placeholder="Name"></td>
        </tr>
        <tr>
            <td><input type="number" name="age" required placeholder="Age"></td>
        </tr>
        <tr>
            <td><input type="radio" name="gender" value="male" required> Male</td>
        </tr>
        <tr>
            <td><input type="radio" name="gender" value="female"> Female</td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit"></td>
        </tr>
    </table>
</form>
<?php
if (isset($_GET) &&
    !empty($_GET) &&
    sizeof($_GET) === 3
) {
    $name = trim($_GET['name']);
    $age = intval(trim($_GET['age']));
    $gender = trim($_GET['gender']);

    echo "My name is {$name}. I am {$age} years old. I am a {$gender}";
}
?>
</body>
</html>