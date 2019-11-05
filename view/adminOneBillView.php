<?php 
if (!isset($_SESSION['admin'])) 
{
    header('Location: http://localhost/Projet_4/index.php');
}
else
{  
?>

    <?php ob_start(); ?> <!-- Départ de ce qui va être enregistré dans $content -->

    <p><a href="index.php">Retour à la liste des billets</a></p>

    <div class="news">
        <h2><?= htmlspecialchars($bill['title']) ?></h2>

        <h3>Par <?= htmlspecialchars($bill['author']) ?> le <em><?= $bill['creation_date_fr'] ?></em></h3>
        <p>
            <?= $bill['content'] ?>
        </p>
    </div>

    <h2>Commentaires</h2>

    <!-- Affichage d'un formulaire pour écrire un nouveau commentaire -->

    <form action="index.php?action=addComment&amp;id=<?= $bill['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" value="<?= $_SESSION['admin'] ?>" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment" class="tinymce"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

    <?php

    while ($comment = $comments->fetch())
    {
        ?>
        <p>
            <strong><?= htmlspecialchars($comment['comment_author']) ?></strong> le <?= $comment['comment_date_fr'] ?>
        </p>

        <?= $comment['comment'] ?>
        <a href="http://localhost/projet_4/index.php?action=deleteCommentValidation&amp;commentId=<?= $comment['id'] ?>"  class="delete_comment"><input type="button" value="Effacer le commentaire"></a>
    <?php
    }
    ?>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php 
require('adminHeader.php');
require('templates/template.php'); 
?>