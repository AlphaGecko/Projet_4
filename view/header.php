<?php ob_start(); ?>

<nav>
    <p style="text-align: right;">
        <a href="index.php?action=connexion">Connexion</a>
    </p>
</nav>

<hr />

<?php $blogHeader = ob_get_clean(); ?>