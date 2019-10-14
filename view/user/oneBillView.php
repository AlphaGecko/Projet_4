<?php $title = htmlspecialchars($bill['title']); ?>

<?php ob_start(); ?> <!-- Départ de ce qui va être enregistré dans $content -->

<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($bill['title']) ?>
        <em>le <?= $bill['creation_date'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($bill['content'])) ?>
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
        <textarea id="comment" name="comment"></textarea>
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

    <p>
        <?= nl2br(htmlspecialchars($comment['comment'])) ?>
    </p>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php 
require('header.php');
require('view/template.php'); 
?>