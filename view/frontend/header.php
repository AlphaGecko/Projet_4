<?php ob_start(); ?>

<nav>
    <p>
        <div id="logo">
            <a href="index.php">
                <img id="logo" src="public/images/forteroche.png" alt="logo 'Forteroche'">
            </a>
        </div>       

        <div id="menu">
            <a href="https://www.alpha-gecko.com/Projet_4">Page d'accueil</a>
            <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=allBills">Toute l'histoire</a>
            <a href="https://en.wikipedia.org/wiki/The_Auteurs" target="_blank">Biographie</a> 
        </div>
    </p>
</nav>


<?php $header = ob_get_clean(); ?>