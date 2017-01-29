<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculate</title>
</head>
<body>
<form action="" method="get">
    <div>
        <label for="operation">Operation</label>
        <select name="operation" id="operation" title="Operation" required>
            <option value="sum">Sum</option>
            <option value="subtract">Subtract</option>
        </select>
    </div>
    <div>
        <label for="numA">Number 1:</label>
        <input type="number" name="numA" id="numA" required>
    </div>
    <div>
        <label for="numB">Number 2:</label>
        <input type="number" name="numB" id="numB" required>
    </div>
    <?php if (isset($result)) : ; ?>
        <div>
            <label for="result">Result:</label>
            <input type="text" id="result" disabled value="<?= $result ?>">
        </div>
    <?php endif; ?>
    <div>
        <button>Calculate</button>
    </div>
</form>
</body>
</html>