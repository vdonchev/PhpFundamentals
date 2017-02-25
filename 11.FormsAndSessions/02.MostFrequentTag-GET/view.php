<form action="">
    <div>
        <label for="tags">Enter Tags:</label>
    </div>
    <input type="text" name="tags" title="tags" id="tags">
    <?php if (isset($urlStats)): ; ?>
        <input type="hidden" name="stats" value="<?= $urlStats ?>">
    <?php endif; ?>
    <input type="submit" value="submit" name="submit">
    <input type="submit" value="clear" name="clear">
</form>
<?php if (isset($allTags, $mostFrequentTag)): ; ?>
    <?php foreach ($allTags as $tag => $count) : ; ?>
        <div><?= $tag ?> : <?= $count ?> times</div>
    <?php endforeach; ?>
    <div>Most frequent tag is: <?= $mostFrequentTag ?></div>
<?php endif; ?>