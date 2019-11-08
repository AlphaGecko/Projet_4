<?php session_start(); 
// session_destroy();
?>

<!-- ROUTEUR -->

<?php
require_once('controllers/UserController.php'); 
require_once('controllers/AdminController.php'); 

$userView = new UserController();
$adminView = new AdminController();

if (isset($_GET['action'])) {

    if ($_GET['action'] === 'BillsList' || $_GET['action'] === 'allBills') 
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
        $adminView->adminLogin();
        $data = $adminView->adminDatas->fetch();

        $adminName = $data['admin_name']; 
        $adminPassword = $data['admin_password'];

        if (isset($_POST['admin_id']) && isset($_POST['admin_password']))
        {
            if (htmlspecialchars($_POST['admin_id']) === $adminName && htmlspecialchars($_POST['admin_password']) === $adminPassword)
            {
                $_SESSION['admin'] = $data['admin_pseudo'];
                header('Location: http://localhost/Projet_4/'); 
            } 
            
            else 
            {
                echo 'Identifiant ou mot de passe incorrect';
            }
        }
    }

    elseif($_GET['action'] === 'connexion') 
    {
        $userView->userLogin();
        $data = $userView->userDatas->fetchAll();

        foreach($data as $value)
        {
            $userNameList[$value['user_id']] = $value['user_name']; 
            $userPasswordList[$value['user_id']] = $value['user_password']; 
        }

        if (isset($_POST['user_id']) && isset($_POST['user_password']))
        {
            if (in_array(htmlspecialchars($_POST['user_id']), $userNameList) 
            && in_array(htmlspecialchars($_POST['user_password']), $userPasswordList))
            {
                echo 'Je suis un utilisateur';
            }  
            
            else 
            {
                echo 'Je ne suis pas un utilisateur';
            }
        }
    }

    elseif($_GET['action'] === 'newBillValidation')
    {

        $author = $_SESSION['admin']; 
        
        if (isset($_POST['title']) && isset($_POST['content']))
        {
            $adminView->validation();
            $sendToDb = new AdminController; 
            $sendToDb->addNewBill($_POST['title'], $_POST['content'], $author);
        }
        else 
        {
            echo 'erreur';
        }
    }

    elseif($_GET['action'] === 'deconnexion')
    {
        $adminView->deconnexion();
    }

    elseif ($_GET['action'] === 'editBill')
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        { 
            $adminView->editBill();
        }
    }

    elseif($_GET['action'] === 'editionValidation')
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            $adminView->editionValidation($_GET['id']);
        }
    }

    elseif($_GET['action'] === 'deleteValidation')
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            $adminView->deleteValidation($_GET['id']);
        }
    }

    elseif($_GET['action'] === 'editComment')
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) 
        {
            $adminView->adminBills();
        }
    }

    elseif($_GET['action'] === 'deleteCommentValidation')
    {
        if (isset($_GET['commentId']) && $_GET['commentId'] > 0) 
        {
            $adminView->deleteCommentValidation($_GET['commentId']);
        }
    }

    elseif($_GET['action'] === 'report')
    {
        if(isset($_GET['reportId']) && $_GET['reportId'] > 0)
        {
            $userView->report($_GET['reportId']);
        }
    }

    elseif($_GET['action'] === 'reportedComments')
    {
        $adminView->allReportedComments();
    }

}

/* default views */ 

else if (isset($_SESSION['admin']))
{
    $adminView->adminPanel();
}


else 
{
    $userView->billsList();
}