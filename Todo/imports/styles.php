
<?php function styles($styles){ ?>

    <?php foreach ($styles as $style): ?>
        <link type="text/css" rel="stylesheet" href="<?= $style ?>">
    <?php endforeach; ?>

<?php } ?>