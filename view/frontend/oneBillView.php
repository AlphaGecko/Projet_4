<?php 
if ($bill['id'] !== $_GET['id']) 
{
    header('Location:https://www.alpha-gecko.com/Projet_4/index.php?action=error'); 
    exit();
}
?> 

<?php ob_start(); ?>

<?php $title = htmlspecialchars($bill['title']); ?>

<div class="container-fluid">
    <div class="bill">
        <h3 class="bill_title"><?= htmlspecialchars($bill['title']) ?></h3>

        <h4 class="by">Par <?= htmlspecialchars($bill['author']) ?> le <em><?= $bill['creation_date_fr'] ?></em></h4>

        <div class="bill_content">   
            <?= $bill['content'] ?>
        </div>
    </div>
</div>

<p><a href="https://www.alpha-gecko.com/Projet_4" class="back">Retour à la liste des billets</a></p>

<div class="comments_container">

    <h2 class="comment_title">Commentaires</h2>

    <form action="index.php?action=bill&amp;id=<?= $bill['id'] ?>&amp;comment=addComment" method="post">
        <div>
            <label for="author" id="author">Auteur</label><br />
            <input type="text" id="author_input" name="author" required />
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

                <form action="index.php?action=report&amp;reportId=<?= $comment['id'] ?>&amp;id=<?= $_GET['id'] ?>" method="post">
                    <input type="submit" value="Signaler ce commentaire" class="report">
                </form>
            </p>

            <?= $comment['comment'] ?>
        </div>
    <?php
    }
    ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php 
require_once('header.php');
require_once('footer.php');
require_once('templates/template.php'); 
?>