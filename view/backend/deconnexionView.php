<?php ob_start(); ?>

<?php $title = 'Déconnexion' ?>

<p id="disconnect">Vous êtes déconnecté !</p>

<?= $content = ob_get_clean(); ?>

<?php header('Refresh: 2; URL=https://www.alpha-gecko.com/Projet_4'); ?>

<?php require_once('templates/template.php'); ?>
