<?php $title = 'Déconnexion' ?>

<?php ob_start(); ?>

<p id="disconnect">Vous êtes déconnecté !</p>

<?= $content = ob_get_clean(); ?>

<?php header('Refresh: 1; URL=https://www.alpha-gecko.com/Projet_4'); ?>

<?php require('templates/template.php'); ?>
