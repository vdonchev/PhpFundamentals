<form action="">
    <div>
        <label for="tag">Enter HTML Tag:</label>
    </div>
    <input type="text" name="tag" title="tag" id="tag" required>
    <input type="submit" value="submit" name="submit">
</form>
<?php if (isset($score, $validity)): ; ?>
    <h1><?= $validity ? "Valid" : "Invalid" ?> HTML tag!</h1>
    <h1>Score: <?= $score ?></h1>
<?php endif; ?>