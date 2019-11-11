<?php ob_start(); ?>

<?php $title = 'Billet simple pour l\'Alaska' ?>

<header>
    <div id="header_container">
        <div id="main_title">
            <h1>Billet simple pour l 'Alaska</h1>
        </div>

        <div id="hook">
            <h2> 
                <strong>"</strong> Je vous propose un nouveau billet chaque jour, narrant l'histoire passionnante d'un jeune homme débutant 
                une nouvelle vie en Alaska.<strong>"</strong>
            </h2>
        </div>

        <div id="alaska">
            <img src="public/images/alaska.jpg">
        </div>
    </div>
</header>

<?php
while ($data = $bills->fetch())
{
?>
    <div class="container-fluid">
        <div class="bill">
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
                    <?= $billOverview ?> <p class="suspension_points">[...]</p> <br />
                    <p>
                        <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=bill&amp;id=<?= $data['id'] ?>" class="full_view_link">Voir la suite du billet et les commentaires -></a>
                    </p>
                <?php
                }
                else
                {
                ?>
                    <?= $data['content'] ?> <br />
                    <p>
                        <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=bill&amp;id=<?= $data['id'] ?>" class="full_view_link">Voir les commentaires -></a>
                    </p>
                <?php
                } 
                ?>      
                <br/> 
            </div>
        </div>
    </div>

<?php
}
$bills->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php 
require_once('header.php');
require_once('footer.php');
require_once('templates/template.php'); 
?>