<?php 
if (!isset($_SESSION['admin'])) 
{
    header('Location:https://www.alpha-gecko.com/Projet_4');
}
?>

<?php $title = 'Validation' ?>

<?php ob_start();

if (isset($_GET['action']))
{ 

?>

<?php 
if($_GET['action'] === 'newBillValidation')
{
?>
    <div id="validation_container">
        <h2 class="validation">Votre billet à bien été publié !</h2>
        <a href="https://www.alpha-gecko.com/Projet_4" class="back"><p>Retour à panneau adminisitrateur</p></a>
    </div>
<?php
}
elseif($_GET['action'] === 'editionValidation')
{
?>
    <div id="validation_container"> 
        <h2 class="validation">Votre billet à bien été modifié !</h2>
        <a href="https://www.alpha-gecko.com/Projet_4" class="back"><p>Retour à panneau adminisitrateur</p></a>
    </div>
<?php
}
elseif($_GET['action'] === 'deleteValidation')
{
?>
    <div id="validation_container">
        <h2 class="validation">Votre billet à bien été supprimé !</h2>
        <a href="https://www.alpha-gecko.com/Projet_4" class="back"><p>Retour à panneau adminisitrateur</p></a>
    </div>
<?php
}
elseif($_GET['action'] === 'deleteCommentValidation')
{
?>
    <div id="validation_container">
        <h2 class="validation">Le commentaire à bien été supprimé !</h2>
        <a href="https://www.alpha-gecko.com/Projet_4" class="back"><p>Retour à panneau adminisitrateur</p></a>
    </div>
<?php
}
?>

<?php $content = ob_get_clean(); 
}
?>

<?php 
require('adminHeader.php');
require('templates/template.php'); 
?>