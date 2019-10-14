<?php 
if (!$_SESSION['admin']) 
{
    header('Location: <ital>http://localhost/Projet_4/index.php</ital>');
}
?>

<?php ob_start(); ?>

<h1>Espace administrateur</h1>

<?php $content = ob_get_clean(); ?>

<?php 
require('header.php');
require('template.php'); 
?>