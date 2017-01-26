<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Information</title>
    <style>
        table {
            border-collapse: collapse;
            table-layout: fixed;
        }

        td {
            border: 1px solid black;
            padding: .2em;
        }
    </style>
</head>
<body>
<?php
$information = [];
$information['Name'] = 'Videlin';
$information['Phone Number'] = '+359895123456';
$information['Age'] = 31;
$information['Address'] = 'Downtown';
?>

<table>
    <thead></thead>
    <tbody>
    <?php foreach ($information as $key => $value): ; ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><?php echo $value; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>