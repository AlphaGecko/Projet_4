<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php
while ($data = $bills->fetch())
{
?>

    <div class="news">
        <h2><?= htmlspecialchars($data['title']) ?></h2>

        <h3>Par <?= htmlspecialchars($data['author']) ?> le <em><?= $data['creation_date'] ?></em></h3>
        <p>
            <?= $data['content'] ?>
            <br />
            <em><a href="index.php?action=bill&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>

<?php
}
$bills->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php 
require('header.php');
require('templates/template.php'); 
?>