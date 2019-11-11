<?php $title = 'Toute l\'histoire' ?>

<?php ob_start(); ?>

<ul>

<?php
while ($data = $bills->fetch())
{
?>
    <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=bill&amp;id=<?= $data['id'] ?>" class="full_view_link_list">
        
        <li class="one_bill_container_list">
            <h3 class="bill_title_list"><?= htmlspecialchars($data['title']) ?></h3>
        </li>
    </a>

<?php
}
$bills->closeCursor();
?>

</ul>

<?php $content = ob_get_clean(); ?>

<?php 
require('header.php');
require('footer.php');
require('templates/template.php'); 
?>