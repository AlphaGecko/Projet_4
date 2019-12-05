<?php 
if (!isset($_SESSION['admin'])) 
{
    header('Location:https://www.alpha-gecko.com/Projet_4');
    exit();
}
else
{  
?>

    <?php ob_start(); ?>

    <?php $title = 'ERREUR' ?>

    <?php 
    if($_GET['action'] === 'newBillValidation' || $_GET['action'] === 'editionValidation')
    {
    ?>
        <div id="validation_container">
            <h2 class="validation">Erreur lors de la validation. Veuillez ne jamais modifier vous-même l'URL de votre navigateur. Faites "revenir en arrière" sur votre navigateur pour ne pas perdre votre travail.</h2>
        </div>
    <?php
    }
    elseif(
    $_GET['action'] === 'editBill' || 
    $_GET['action'] === 'deleteValidation' || 
    $_GET['action'] === 'editComment' || 
    $_GET['action'] === 'deleteCommentValidation' ||
    $_GET['action'] === 'reportedComments' || 
    $_GET['action'] === 'cancelReportValidation'
    )
    {
    ?>
        <div id="validation_container">
            <h2 class="validation">Votre action n'a pas pu aboutir. Veuillez ne jamais modifier vous-même l'URL du navigateur.</h2>
        </div>
        <a href="https://www.alpha-gecko.com/Projet_4/" class="back"><p>Retour au panneau d'administration.</p></a>
    <?php
    }
    else
    {
    ?>
        <div id="validation_container">
            <h2 class="error">La page que vous recherchez n'existe pas.</h2>
        </div>
        <a href="https://www.alpha-gecko.com/Projet_4/" class="back"><p>Retour au panneau d'administration.</p></a>
    <?php
    }
}
?>

<?php $content = ob_get_clean(); ?>

<?php 
require_once('adminHeader.php');
require_once('templates/template.php'); 
?>
