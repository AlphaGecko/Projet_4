<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>tinymce.init({selector:'textarea'});</script>
    </head>
        
    <body>
        <?php 
        if (!$_SESSION['admin'] && !$_SESSION['user']) 
        {
        ?>
            <?= $noSessionHeader ?>
            <?= $content ?>
        <?php
        }

        else if ($_SESSION['user'])
        {
        ?>
            <?= $userHeader ?>
            <?= $content ?>
        <?php
        }

        else if ($_SESSION['admin'])
        {
        ?> 

            <?= $adminHeader ?> 
            <?= $content ?>
        <?php
        }
        ?>
        
        
        <script src="public/js/script.js"></script>
    </body>
</html>
