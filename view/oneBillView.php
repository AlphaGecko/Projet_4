<?php $title = htmlspecialchars($bill['title']); ?>

<?php ob_start();

if(isset($_SESSION['admin']))
{
?>
    <p>Aperçu du billet tel qu'il est vu par un utilisateur. <a href="index.php">Retour au panneau administateur</a></p>
<?php
}
?>

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
        <input type="text" id="author" name="author" />
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
    <form action="index.php?action=report&amp;reportId=<?= $comment['id'] ?>&amp;id=<?= $_GET['id'] ?>" method="post">
        <input type="submit" value="Signaler ce commentaire" class="report">
    </form>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php 
require('header.php');
require('templates/template.php'); 
?>