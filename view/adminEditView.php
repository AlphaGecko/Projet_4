<?php 
if (!isset($_SESSION['admin'])) 
{
    header('Location: http://localhost/Projet_4/');
}
else
{  
?>

    <?php ob_start(); ?>

        <div id="edit_container">
            <form action="index.php?action=editionValidation&amp;id=<?= $_GET['id'] ?>" method="post">
                <div>
                    <label for="author" id="author">Auteur : </label><span id="author_input"><?= $_SESSION['admin'] ?></span>
                </div>

                <div>
                    <label for="title">Titre</label><br />
                    <textarea id="titre" name="title"> <?= $bill['title'] ?> </textarea>
                </div>

                <div>
                    <label for="content">Contenu</label><br />
                    <textarea id="newBill" name="content" class="tinymce"> <?= $bill['content'] ?> </textarea>
                </div>

                <input type="submit" name="valider" value="Valider les modifications" class="add_button" /> 
                <a href="index.php?action=deleteValidation&amp;id=<?=$_GET["id"]?>"><input type="button" value="Supprimer" class="delete_button"/></a>
                <a href="http://localhost/Projet_4"><input type="button" class="cancel_button" value="Annuler"/>
            </form>
        </div>

    <?php 
}
$content = ob_get_clean(); ?>


<?php 
require('adminHeader.php');
require('footer.php');
require('templates/template.php'); 
?>