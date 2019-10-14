<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

<h1>Connexion</h1>

<form action="index.php?action=connexion" method="post">
    <div>
        <label for="admin_name">Identifiant</label><br />
        <input type="text" id="identifiant" name="admin_id" required />
    </div>
    <div>
        <label for="admin_password">Mot de passe</label><br />
        <input type="password" id="mdp" name="admin_password" required />
    </div>
    <div>
        <input type="submit" id="checkAdmin"/>
    </div>
</form>

<p><a href="index.php">Retour à la liste des billets</a></p>

<?= $content = ob_get_clean(); ?>