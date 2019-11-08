<?php ob_start(); ?>

<?php
if (isset($_GET['action']))
{ 
    if($_GET['action'] === 'report')
    {
    ?>
        <div id="validation_container">
            <h2 class="validation">Le commentaire à bien été signalé !</h2>
            <a href="index.php?action=bill&id=<?= $_GET['id'] ?>" class="back"><p>Retour au billet</p></a>
        </div>
    <?php
    }
}
?>

<?php $content = ob_get_clean(); ?>

<?php 
require('header.php');
require('templates/template.php'); 
?>