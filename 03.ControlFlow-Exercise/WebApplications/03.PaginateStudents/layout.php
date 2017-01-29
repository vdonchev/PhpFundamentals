<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Render Students</title>
    <style>
        table, td, th {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<form action="" method="get">
    <div>
        <label for="delimiter">Delimiter: </label>
        <select name="delimiter" id="delimiter">
            <option value=",">,</option>
            <option value="|">|</option>
            <option value="&amp;">&amp;</option>
        </select>
    </div>
    <div>
        <label for="names">Names: </label>
        <input type="text" id="names" name="names" required>
    </div>
    <div>
        <label for="ages">Ages: </label>
        <input type="text" id="ages" name="ages" required>
    </div>
    <div>
        <button>Filter!</button>
    </div>
</form>
<?php if (isset($students)) : ; ?>
    <hr>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
        </tr>
        </thead>
        <tbody>
        <?php for ($i = $page * 5; $i < min(($page * 5) + 5, sizeof($students)); $i++) : ; ?>
            <tr>
                <td><?= $students[$i]->name ?></td>
                <td><?= $students[$i]->age ?></td>
            </tr>
        <?php endfor; ?>
        </tbody>
    </table>
    <?php if ($page > 0) : ; ?>
        <a href="<?= $_SERVER['PHP_SELF'] ?>?page=<?= $page - 1 ?>">Previous</a>
    <?php endif; ?>
    <?php if (($page + 1) * 5 < sizeof($students)) : ?>
        <a href="<?= $_SERVER['PHP_SELF'] ?>?page=<?= $page + 1 ?>">Next</a>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>