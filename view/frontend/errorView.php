<?php ob_start(); ?>

<?php $title = 'ERREUR' ?>

<?php 
if($_GET['action'] === 'bill' && $_GET['comment'] === 'addComment')
{
?>
    <div id="validation_container">
        <h2 class="validation">Vous devez écrire un commentaire avant de valider.</h2>
        <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=bill&id=<?= $_GET['id'] ?>" class="back"><p>Retour au billet</p></a>
    </div>
<?php
}
elseif($_GET['action'] === 'connexion')
{
?>
    <div id="validation_container">
        <h2 class="validation">Nom ou mot de passe incorrect</h2>
        <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=admin" class="back"><p>Retour à l'espace de connexion</p></a>
        <a href="https://www.alpha-gecko.com/Projet_4" class="back"><p>Retour à l'accueil</p></a>
    </div>
<?php
}
else
{
?>
    <div class="error_container">
        <p class="error">La page que vous recherchez n'existe pas.</p>
        <a href="https://www.alpha-gecko.com/Projet_4" class="back"><p>Retour à l'accueil</p></a>
    </div>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php 
if(isset($_SESSION['admin']))
{
    require_once('backend/adminHeader.php');
}
else
{
    require_once('header.php');
}
require_once('footer.php');
require_once('templates/template.php'); 
?>
