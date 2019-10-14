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

    elseif($_GET['action'] === 'connexion') 
    {
        $adminView->adminLogin();
        $data = $adminView->adminDatas->fetch();

        $adminName = $data['admin_name']; 
        $adminPassword = $data['admin_password'];

        if (isset($_POST['admin_id']) && isset($_POST['admin_password']))
        {
            if (htmlspecialchars($_POST['admin_id']) === $adminName && htmlspecialchars($_POST['admin_password']) === $adminPassword)
            {
                echo 'Je suis administrateur';
            } 
            
            else 
            {
                echo 'Je ne suis pas administrateur';
            }
        }
    }

}

else 
{
    $userView->billsList();
}