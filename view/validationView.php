<?php 
if (!isset($_SESSION['admin'])) 
{
    header('Location: http://localhost/Projet_4/index.php');
}
else
{ 
   
?>

<?php ob_start(); ?>

<h2>Votre billet à bien été envoyé !</h2>
<a href="index.php"><p>Retour à panneau adminisitrateur</p></a>

<?php $content = ob_get_clean(); 
}
?>

<?php 
require('adminHeader.php');
require('templates/template.php'); 
?>