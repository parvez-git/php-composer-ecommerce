<!-- VALIDATOR ERROR MESSAGES -->

<?php if(isset($_SESSION['validator-errors'])) : ?>

    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($_SESSION['validator-errors'] as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>