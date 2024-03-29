<?php 
if (!isset($_SESSION['admin'])) 
{
    header('Location:https://www.alpha-gecko.com/Projet_4');
    exit();
}
?>
    <?php ob_start(); ?>

    <?php $title = 'Validation' ?>

    <?php

    if (isset($_GET['action']))
    { 

    ?>

    <?php 
    if($_GET['action'] === 'newBillValidation')
    {
    ?>
        <div id="validation_container">
            <h2 class="validation">Votre billet à bien été publié !</h2>
            <a href="https://www.alpha-gecko.com/Projet_4" class="back"><p>Retour à panneau adminisitrateur</p></a>
        </div>
    <?php
    }
    elseif($_GET['action'] === 'editionValidation')
    {
    ?>
        <div id="validation_container"> 
            <h2 class="validation">Votre billet à bien été modifié !</h2>
            <a href="https://www.alpha-gecko.com/Projet_4" class="back"><p>Retour à panneau adminisitrateur</p></a>
        </div>
    <?php
    }
    elseif($_GET['action'] === 'deleteValidation')
    {
    ?>
        <div id="validation_container">
            <h2 class="validation">Votre billet à bien été supprimé !</h2>
            <a href="https://www.alpha-gecko.com/Projet_4" class="back"><p>Retour à panneau adminisitrateur</p></a>
        </div>
    <?php
    }
    elseif($_GET['action'] === 'deleteCommentValidation')
    {
    ?>
        <div id="validation_container">
            <h2 class="validation">Le commentaire à bien été supprimé !</h2>
            <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=reportedComments" class="back"><p>Retour à la liste des commentaires signalés</p></a>
            <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=editComment&amp;id=<?= $_GET['id'] ?>" class="back"><p>Retour au billet associé</p></a>
            <a href="https://www.alpha-gecko.com/Projet_4" class="back"><p>Retour au panneau adminisitrateur</p></a>
        </div>
    <?php
    }
    elseif($_GET['action'] === 'cancelReportValidation')
    {
    ?>
        <div id="validation_container">
            <h2 class="validation">Le commentaire n'est plus signalé comme indésirable !</h2>
            <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=reportedComments" class="back"><p>Retour à la liste des commentaires signalés</p></a>
            <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=editComment&amp;id=<?= $_GET['id'] ?>" class="back"><p>Retour au billet associé</p></a>
            <a href="https://www.alpha-gecko.com/Projet_4" class="back"><p>Retour à panneau adminisitrateur</p></a>
        </div>
    <?php
    }
    elseif($_GET['action'] === 'bill' && $_GET['comment'] === 'addComment')
    {
    ?>
        <div id="validation_container">
            <h2 class="validation">Votre commentaire à bien été posté !</h2>
            <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=editComment&amp;id=<?= $_GET['id'] ?>" class="back"><p>Retour au billet associé</p></a>
        </div>
    <?php
    }
    ?>

    <?php $content = ob_get_clean(); ?>
<?php
}
?>

<?php 
require_once('adminHeader.php');
require_once('templates/template.php'); 
?>