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
while ($comment = $reports->fetch())
{
    if ($comment['report'] > 0)
    {
    ?> 
         <p>
            <strong><?= htmlspecialchars($comment['comment_author']) ?></strong> le <?= $comment['comment_date_fr'] ?>
        </p>

        <?= $comment['comment'] ?>
        <a href="http://localhost/projet_4/index.php?action=deleteCommentValidation&amp;commentId=<?= $comment['id'] ?>"  class="delete_comment"><input type="button" value="Effacer le commentaire"></a>
    <?php
    }
}
?>


<?php $content = ob_get_clean(); 
}
?>

<?php 
require('adminHeader.php');
require('templates/template.php'); 
?>