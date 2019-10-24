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

<h2>Créer un nouveau billet</h2>

<form action="index.php" method="post">

    <div>
        <label for="author">Auteur : </label><?= $_SESSION['admin'] ?>
    </div>

    <div>
        <label for="titre">Titre</label><br />
        <textarea id="titre" name="titre"></textarea>
    </div>

    <div>
        <label for="contenu">Contenu</label><br />
        <textarea id="newBill" name="contenu"></textarea>
    </div>

    <input type="submit" />
</form>


<h2>Voir la liste des billets pour les modifier ou les supprimer</h2>
<input type="button" value="Liste des billet" id="adminListBill">

<h2>Commentaire(s) signalé(s) : </h2>

<?php $content = ob_get_clean(); 
}
?>

<?php 
require('adminHeader.php');
require('view/template.php'); 
?>