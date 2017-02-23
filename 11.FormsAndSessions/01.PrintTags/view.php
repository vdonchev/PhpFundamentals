<form action="">
    <div>
        <label for="tags">Enter Tags:</label>
    </div>
    <input type="text" name="tags" title="tags" id="tags">
    <input type="submit" value="Submit tags" name="submit">
</form>
<?php if (isset($tags) && count($tags) > 0): ?>
    <?php /** @var $tags string[] */; ?>
    <?php foreach ($tags as $i => $tag) : ; ?>
        <div><?php echo $i; ?> : <?php echo $tag; ?></div>
    <?php endforeach; ?>
<?php endif; ?>