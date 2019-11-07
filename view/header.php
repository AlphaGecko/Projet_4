<?php ob_start(); ?>

<nav>
    <p>
        <div id="logo">
            <a href="index.php">
                <img id="logo" src="public/images/forteroche.png" alt="logo 'Forteroche'">
            </a>
        </div>       

        <div id="menu">
            <a href="index.php">Page d'accueil</a>
            <a href="index.php?action=allBills">Toute l'histoire</a>
            <a href="http/localhost/projet_4/biographie.html">Biographie</a> 
        </div>
    </p>
</nav>


<?php $header = ob_get_clean(); ?>