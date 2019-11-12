<?php ob_start(); ?>

<nav>
    <p>
        <div id="logo">
            <a href="index.php">
                <img id="logo" src="public/images/forteroche.png" alt="logo 'Forteroche'">
            </a>
        </div>   
        
        <span id="admin_panel_title_container">
            <h1>Panneau administrateur</h1>
        </span>

        <div id="admin_menu">
            <a href="https://www.alpha-gecko.com/Projet_4/index.php?action=deconnexion">Déconnexion</a></p>
        </div>
    </p>
</nav>

<?php $header = ob_get_clean(); ?>