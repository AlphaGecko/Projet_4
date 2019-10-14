<?php $title = 'Connexion admin'; ?>

<?php ob_start(); ?>

<h1>Connexion</h1>

<form action="index.php?action=admin" method="post">
    <div>
        <label for="admin_name">Identifiant</label><br />
        <input type="text" id="identifiant" name="identifiant" required />
    </div>
    <div>
        <label for="admin_password">Mot de passe</label><br />
        <input type="text" id="mdp" name="admin password" required />
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<p><a href="index.php">Retour à la liste des billets</a></p>


<?= $content = ob_get_clean(); ?>
