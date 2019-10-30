<?php 
if (!isset($_SESSION['admin'])) 
{
    header('Location: http://localhost/Projet_4/index.php');
}
?>

<?php ob_start();

if (isset($_GET['action']))
{ 

?>

<?php 
if($_GET['action'] === 'newBillValidation')
{
?>
    <h2>Votre billet à bien été envoyé !</h2>
    <a href="index.php"><p>Retour à panneau adminisitrateur</p></a>
<?php
}
elseif($_GET['action'] === 'editionValidation')
{
?>
    <h2>Votre billet à bien été modifié !</h2>
    <a href="index.php"><p>Retour à panneau adminisitrateur</p></a>
<?php
}
elseif($_GET['action'] === 'deleteValidation')
{
?>
    <h2>Votre billet à bien été supprimé !</h2>
    <a href="index.php"><p>Retour à panneau adminisitrateur</p></a>
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