<?php ob_start(); ?>

<?php
if (isset($_GET['action']))
{ 
    if($_GET['action'] === 'report')
    {
    ?>
        <h2>Le commentaire à bien été signalé !</h2>
        <a href="index.php?action=bill&id=<?= $_GET['id'] ?>"><p>Retour au billet</p></a>
    <?php
    }
}
?>

<?php $content = ob_get_clean(); ?>

<?php 
require('header.php');
require('templates/template.php'); 
?>