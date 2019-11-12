<?php ob_start(); ?>

<?php $title = 'Validation' ?>

<?php
if (isset($_GET['action']))
{ 
    if($_GET['action'] === 'report')
    {
    ?>
        <div id="validation_container">
            <h2 class="validation">Le commentaire à bien été signalé !</h2>
            <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=bill&id=<?= $_GET['id'] ?>" class="back"><p>Retour au billet</p></a>
        </div>
    <?php
    }
    if($_GET['action'] === 'bill' && $_GET['comment'] === 'addComment')
    {
    ?>
        <div id="validation_container">
            <h2 class="validation">Votre commentaire à bien été posté !</h2>
            <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=bill&id=<?= $_GET['id'] ?>" class="back"><p>Retour au billet</p></a>
        </div>
    <?php
    }
}
?>

<?php $content = ob_get_clean(); ?>

<?php 
require_once('header.php');
require_once('templates/template.php'); 
?>