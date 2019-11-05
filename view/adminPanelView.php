<?php 
if (!isset($_SESSION['admin'])) 
{
    header('Location: http://localhost/Projet_4/index.php');
}
else
{ 
   
?>

<?php ob_start(); ?>

<?php 

$reportedNumber = 0;

while ($reportList = $reports->fetch())
{
    if($reportList['report'] > 0)
    {
        $reportedNumber++;
    }
}
?>

<div id="adminChoice">
    <input type="button" id="add_button" value="Ajouter un billet" />
    <input type="button" id="list_button" value="Liste des billets" />
    <span id="alert">Il y'a actuellement 
        <span class="btn btn-warning">
            <a href="index.php?action=reportedComments">
                <span class="badge">
                    <?= $reportedNumber ?> 
                </span>
                commentaire(s)
            </a>
        </span> 
        signalé(s).
    </span>
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
        <div class="row">
            <div class="col-sm-offset-1 col-sm-1"></div>
            <div class="news col-sm-10 rounded-right border shadow-sm p-3 mb-5 bg-white">
                <h3><?= htmlspecialchars($data['title']) ?></h3>

                <h4>Par <?= htmlspecialchars($data['author']) ?> le <em><?= $data['creation_date_fr'] ?></em></h4>
                <p>
                    <?php 
                    if (strlen($data['content']) >= 1500) 
                    {
                    ?>
                        <?= substr($data['content'], 0, 1500) ?> [...] <br />
                        <em><a href="index.php?action=bill&amp;id=<?= $data['id'] ?>" class="full_view_link">Voir la suite du billet -></a></em>
                    <?php
                    }
                    elseif(strlen($data['content']) < 1500)
                    {
                    ?>
                        <?= $data['content'] ?> <br />
                        <em><a href="index.php?action=bill&amp;id=<?= $data['id'] ?>" class="full_view_link">Voir le billet -></a></em>
                    <?php
                    } 
                    ?>     
                    <br/> 
                </p>
            </div>

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