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

    <?php $title = 'Commentaires signalés' ?>

    <p><a href="https://www.alpha-gecko.com/Projet_4" class="back">Retour au panneau administrateur</a></p>

    <?php 
    while ($comment = $reports->fetch())
    {
        if (isset($comment['report'])  && filter_var($comment['report'], FILTER_VALIDATE_INT) > 0)
        {
        ?> 
            <div class="container one_comment">
                <p class="commented_by">
                    Par <strong><?= htmlspecialchars($comment['comment_author']) ?></strong> le <em> <?= $comment['comment_date_fr'] ?> </em>

                    <hr class="md-2" />
                </p>

                <?= $comment['comment'] ?>
            </div>

            <div class="admin_buttons_container">
                <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=deleteCommentValidation&amp;commentId=<?= $comment['id'] ?>"  class="delete_comment"><input type="button" value="Effacer le commentaire" class="delete_comment_button"></a>
            </div>
        <?php
        }
    }
    ?>

    <?php $content = ob_get_clean(); ?>
    
<?php
}
?>

<?php 
require('adminHeader.php');
require('templates/template.php'); 
?>