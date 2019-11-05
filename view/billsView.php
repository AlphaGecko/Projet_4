<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<header>
        <h1>
            Billet simple pour l'alaska
        </h1>

        <hr class="my-2">

        <h2> 
            <strong>"</strong> Je vous propose un nouveau billet chaque jour, narrant l'histoire passionnante d'un jeune homme débutant 
            une nouvelle vie en Alaska.<strong>"</strong> <br />
        </h2>

        <p>Forteroche Jean</p>
</header>

<?php
while ($data = $bills->fetch())
{

?>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-1"></div>
        <div class="news col-sm-10 bill">
            <h3><?= htmlspecialchars($data['title']) ?></h3>

            <h4>Par <?= htmlspecialchars($data['author']) ?> le <em><?= $data['creation_date_fr'] ?></em></h4>
            <p>
                <?php 
                if (strlen($data['content']) > 3000) 
                {
                ?>
                    <?= substr($data['content'], 0, 3000) ?> [...] <br />
                    <em><a href="index.php?action=bill&amp;id=<?= $data['id'] ?>" class="full_view_link">Voir la suite du billet et les commentaires -></a></em>
                <?php
                }
                elseif(strlen($data['content']) < 3000)
                {
                ?>
                    <?= $data['content'] ?> <br />
                    <em><a href="index.php?action=bill&amp;id=<?= $data['id'] ?>" class="full_view_link">Voir les commentaires -></a></em>
                <?php
                } 
                ?>      
                <br/> 
            </p>

            
        </div>
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