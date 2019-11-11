<?php 
if (!isset($_SESSION['admin'])) 
{
    header('Location:https://www.alpha-gecko.com/Projet_4');
}
else
{ 
   
?>

<?php $title = 'Panneau administrateur' ?>

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

    <div class="admin_buttons_container">
        <input type="button" id="add_button" value="Ajouter un billet" />
        <input type="button" id="list_button" value="Liste des billets" />
    </div>

    <div id="alert">Il y'a actuellement 
        <span class="btn btn-warning">
            <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=reportedComments">
                <span class="badge">
                    <?= $reportedNumber ?> 
                </span>
                commentaire(s)
            </a>
        </span> 
        signalé(s).
    </div>

</div>

<div id="request_box">

    <div id="add_container">
        <form action="index.php?action=newBillValidation" method="post">

            <div>
                <label for="author" id="author">Auteur :</label> <span id="author_input"><?= $_SESSION['admin'] ?>
            </div>

            <div>
                <label for="title">Titre</label><br />
                <textarea id="titre" name="title"></textarea>
            </div>
            
            <div>
                <label for="content">Contenu</label><br />
                <textarea id="newBill" name="content" class="tinymce"></textarea>
            </div>

            <input type="submit" name="valider" id="bill_submit" />
            
        </form>
    </div>
    
    <div id="list_container">
    <?php
    while ($data = $bills->fetch())
    {
    ?>
        <div class="container">
            <h3 class="bill_title"><?= htmlspecialchars($data['title']) ?></h3>

            <h4 class="by">Par <?= htmlspecialchars($data['author']) ?> le <em><?= $data['creation_date_fr'] ?></em></h4>

            <div class="bill_content">
            <?php 
                if (strlen($data['content']) > 3000) 
                {  
                    $maxLenght = 3000;
                    $billOverview = substr($data['content'], 0, $maxLenght);

                    // Boucle permettant de soustraire des éléments jusqu'à la fin d'un balises de tinyMCE.

                    while (substr($billOverview, -1) !== '>' )
                    {
                        $billOverview = substr($data['content'], 0, $maxLenght--);
                    }
                    
                ?>

                    <?= $billOverview ?><p class="suspension_points">[...]</p> <br />

                <?php
                }
                else
                {
                ?>
                    <?= $data['content'] ?> <br />
                <?php
                } 
                ?>     
            </div>

        </div>

        <div class="admin_buttons_container">
            <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=editBill&amp;id=<?= $data['id'] ?>">
                <input type="button" class="edit_button" value="Modifier ou supprimer le billet"/>
            </a>

            <br />

            <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=editComment&amp;id=<?= $data['id']?>">
                <input type="button" class="comment_button" value="Voir le billet complet et les commentaires"/>
            </a>
        </div>

        <div class="separation"></div>
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