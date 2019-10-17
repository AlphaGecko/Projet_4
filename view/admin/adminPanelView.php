<?php 
if (!isset($_SESSION['admin'])) 
{
    header('Location: http://localhost/Projet_4/index.php');
}
else
{ 
   
?>

<?php ob_start(); ?>

<h1>Espace administrateur</h1>

<?php $content = ob_get_clean(); 
}
?>

<?php 
require('adminHeader.php');
require('view/template.php'); 
?>