<?php $title = 'Connexion administrateur' ?>

<?php ob_start(); ?>

<div id="log_container">

    <h1 id="connexion">Connexion administrateur</h1>

    <form action="index.php?action=admin" method="post">

        <div>
            <label for="admin_name">Identifiant</label><br />
            <input type="text" id="identifiant" name="admin_id" required />
        </div>

        <div>
            <label for="admin_password">Mot de passe</label><br />
            <input type="password" id="mdp" name="admin_password" required />
        </div>

        <div>
            <input id="check_admin" type="submit"/>
        </div>

    </form>

    <p><a href="https://www.alpha-gecko.com/Projet_4" class="back">Retour à la liste des billets</a></p>

</div>

<?php $content = ob_get_clean(); ?>

<?php 
require('view/frontend/header.php');
require('templates/template.php'); 
?>