<?php 
if (!isset($_SESSION['admin'])) 
{
    header('Location: http://localhost/Projet_4/index.php');
}
else
{ 
   
?>

<?php ob_start(); ?>

<div id="adminChoice">
    <input type="button" id="add_button" value="Ajouter un billet" />
    <input type="button" id="list_button" value="Liste des billets" />
    <span id="alert">Il y'a actuellement X alertes à signaler</span>
</div>

<div id="request_box">

    <div id="add_container">
        <form action="index.php?action=newBillValidation" method="post">

            <div>
                <label for="author">Auteur : </label><?= $_SESSION['admin'] ?>
            </div>

            <div>
                <label for="title">Titre</label><br />
                <textarea id="titre" name="title"></textarea>
            </div>

            <div>
                <label for="content">Contenu</label><br />
                <textarea id="newBill" name="content" class="tinymce"></textarea>
            </div>

            <input type="submit" name="valider" />
            
        </form>
    </div>
    
    <div id="list_container">
    <?php
    while ($data = $bills->fetch())
    {
    ?>
        <div class="news">
            <p><strong><?= htmlspecialchars($data['title']) ?></strong> Par <?= htmlspecialchars($data['author']) ?> le <em><?= $data['creation_date'] ?></em></p> 

            <p><?= $data['content'] ?> </p>

            <a href="index.php?action=editBill&amp;id=<?= $data['id'] ?>">
                <input type="button" class="edit_button" value="Modifier ou supprimer le billet"/>
            </a>

            <a href="index.php?action=editComment&amp;id=<?= $data['id']?>">
                <input type="button" class="comment_button" value="Gestion des commentaires"/>
            </a>
        </div>
    <?php
    }
    $bills->closeCursor();
    ?>
    </div>

</div>



<?php $content = ob_get_clean(); 
}
?>

<?php 
require('adminHeader.php');
require('templates/template.php'); 
?>