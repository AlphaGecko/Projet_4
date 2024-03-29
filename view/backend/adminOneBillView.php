<?php 
if (!isset($_SESSION['admin'])) 
{
    header('Location:https://www.alpha-gecko.com/Projet_4');
}
else
{  
?>
    <?php ob_start(); ?> 

    <?php $title = $bill['title'] ?>

    <p><a href="https://www.alpha-gecko.com/Projet_4" class="back">Retour au panneau administrateur</a></p>

    <div class="container-fluid">
        <div class="bill">
            <h3 class="bill_title"><?= htmlspecialchars($bill['title']) ?></h3>

            <h4 class="by">Par <?= htmlspecialchars($bill['author']) ?> le <em><?= $bill['creation_date_fr'] ?></em></h4>

            <div class="bill_content">   
                <?= $bill['content'] ?>
            </div>
        </div>
    </div>

    <p><a href="index.php" class="back">Retour à la liste des billets</a></p>

    <div class="comments_container">

        <h2 class="comment_title">Commentaires</h2>

        <form action="index.php?action=bill&amp;id=<?= $bill['id'] ?>&amp;comment=addComment" method="post">
            <div>
                <label for="author" id="author">Auteur</label><br />
                <input type="text" id="author_input" name="author" />
            </div>
            <div>
                <label for="comment" id="comment">Commentaire</label><br />
                <textarea id="comment_input" name="comment" class="tinymce"></textarea>
            </div>
            <div class="comment_submit_container">
                <span><input type="submit" id="comment_submit" /></span>
            </div>
        </form>

        <?php

        while ($comment = $comments->fetch())
        {
        ?>
            <div class="container one_comment">
                <p class="commented_by">
                    Par <strong><?= htmlspecialchars($comment['comment_author']) ?></strong> le <em> <?= $comment['comment_date_fr'] ?> </em>

                    <hr class="md-2" />
                </p>

                <?= $comment['comment'] ?>
                <div class="admin_buttons_container">
                    <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=deleteCommentValidation&amp;commentId=<?= $comment['id'] ?>&amp;id=<?= $bill['id'] ?>"  class="delete_comment"><input type="button" value="Effacer le commentaire" class="delete_comment_button"></a>
                </div>
            </div>
        <?php
        }
    }
?>


<?php $content = ob_get_clean(); ?>

<?php 
require_once('adminHeader.php');
require_once('templates/template.php'); 
?>