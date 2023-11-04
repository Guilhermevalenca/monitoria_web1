<?php function scripts($scripts){ ?>

    <?php foreach ($scripts as $script): ?>
        <script src="<?= $script ?>" ></script>
    <?php endforeach; ?>

<?php } ?>