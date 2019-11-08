<?php ob_start(); ?>

<div class="error_container">
    <p class="error">La page que vous recherchez n'existe pas.</p>

    <p class="error">Redirection vers la page d'accueil.</p>

</div>

<?php header('Refresh: 3; URL=http://localhost/projet_4'); ?>

<?php $content = ob_get_clean(); ?>

<?php 
if(isset($_SESSION['admin']))
{
    require('backend/adminHeader.php');
}
else
{
    require('header.php');
}
require('footer.php');
require('templates/template.php'); 
?>

<?php
exit();

