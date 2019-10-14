<!-- ROUTEUR -->

<?php
require_once('controllers/UserController.php'); 
require_once('controllers/AdminController.php'); 

$userView = new UserController();
$adminView = new AdminController();

if (isset($_GET['action'])) {

    if ($_GET['action'] === 'BillsList') 
    { 
        $userView->billsList();
    }

    elseif ($_GET['action'] === 'bill') 
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        { 
            $userView->bills();
        }

        else 
        {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }

    elseif ($_GET['action'] === 'addComment') 
    { 

        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {

            if (!empty($_POST['author']) && !empty($_POST['comment'])) 
            {
                $userView->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }

            else 
            {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        
        else 
        {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }

    elseif($_GET['action'] === 'admin') 
    {
        $adminView-> adminLogin();
    }
}

else 
{
    $userView->billsList();
}