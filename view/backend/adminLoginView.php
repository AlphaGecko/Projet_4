<?php ob_start(); ?>

<?php $title = 'Connexion administrateur' ?>

<div id="log_container">

    <h1 id="connexion">Connexion administrateur</h1>

    <form action="index.php?action=connexion" method="post">

        <div>
            <label for="admin_name">Identifiant</label><br />
            <input type="text" id="name" name="admin_name" required />
        </div>

        <div>
            <label for="admin_password">Mot de passe</label><br />
            <input type="password" id="password" name="admin_password" required />
        </div>

        <div>
            <input id="check_admin" type="submit"/>
        </div>

    </form>

    <p><a href="https://www.alpha-gecko.com/Projet_4" class="back">Retour à la liste des billets</a></p>

</div>

<?php $content = ob_get_clean(); ?>

<?php 
require_once('view/frontend/header.php');
require_once('view/frontend/footer.php');
require_once('templates/template.php'); 
?>