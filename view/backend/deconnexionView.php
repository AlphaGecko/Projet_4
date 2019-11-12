<?php ob_start(); ?>

<?php $title = 'deconnexion' ?>


<div id="validation_container">
    <h2 class="validation">Vous êtes déconnecté !</h2>
    <a href="https://www.alpha-gecko.com/Projet_4" class="back"><p>Page d'acceuil</p></a>
</div>

<?php $content = ob_get_clean(); ?>

<?php 
require_once('view/frontend/header.php');
require_once('view/frontend/footer.php');
require_once('templates/template.php'); 
?>