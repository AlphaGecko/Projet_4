<?php ob_start(); ?>

<nav>
    <div class="row">
        <p>
            <div class="col-sm-4">
                <a href="index.php">
                    <img id="logo" src="public/images/forteroche.png" alt="logo 'Forteroche'">
                </a>
            </div>       

            <div class="menu col-sm-8">
                <a href="index.php">Page d'accueil</a>
                <a href="index.php?action=allBills">Toute l'histoire</a>
                <a href="http/localhost/projet_4/biographie.html">Biographie</a> 
            </div>
        </p>
    </div>
</nav>


<?php $header = ob_get_clean(); ?>