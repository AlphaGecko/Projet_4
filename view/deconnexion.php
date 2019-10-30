<?php ob_start(); ?>

<p>Vous êtes déconnecté !</p>

<?= $content = ob_get_clean(); ?>

<?php header('Refresh: 1; URL=http://localhost/projet_4'); ?>


