<?php session_start(); 
// session_destroy();
?>

<!-- ROUTEUR -->

<?php
require_once('controllers/frontend/UserController.php'); 
require_once('controllers/backend/AdminController.php'); 

$userView = new UserController();
$adminView = new AdminController();

if (isset($_GET['action'])) {

    try 
    {

    }   

    catch(Exception $e) 
    { 
        echo 'Erreur : ' . $e->getMessage();
    }
    
    
    if ($_GET['action'] === 'BillsList' || $_GET['action'] === 'allBills') 
    {
        $userView->billsList();
    }

    elseif ($_GET['action'] === 'bill') 
    {
        if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
        { 
            $userView->bills();
        }

        else 
        {
            header('Location: http://localhost/Projet_4/index.php?action=error');
        }
    }


    elseif ($_GET['action'] === 'addComment') 
    { 

        if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
        {

            if (!empty($_POST['author']) && !empty($_POST['comment'])) 
            {
                $userView->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }

            else 
            {
                trigger_error('Tous les champs ne sont pas remplis !', E_USER_NOTICE);
            }
        }
        
        else 
        {
            trigger_error('Aucun identifiant de billet n\'a été envoyé !', E_USER_WARNING);
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
            header('Location: http://localhost/Projet_4/index.php?action=error');
        }
    }

    elseif($_GET['action'] === 'deconnexion')
    {
        $adminView->deconnexion();
    }

    elseif ($_GET['action'] === 'editBill')
    {
        if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
        { 
            $adminView->editBill();
        } 
        else 
        {
            header('Location: http://localhost/Projet_4/index.php?action=error');
        }
    }

    elseif($_GET['action'] === 'editionValidation')
    {
        if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
        {
            $adminView->editionValidation($_GET['id']);
        }
        else 
        {
            header('Location: http://localhost/Projet_4/index.php?action=error');
        }
    }

    elseif($_GET['action'] === 'deleteValidation')
    {
        if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
        {
            $adminView->deleteValidation($_GET['id']);
        }
        else 
        {
            header('Location: http://localhost/Projet_4/index.php?action=error');
        }
    }

    elseif($_GET['action'] === 'editComment')
    {
        if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
        {
            $adminView->adminBills();
        }
        else 
        {
            header('Location: http://localhost/Projet_4/index.php?action=error');
        }
    }

    elseif($_GET['action'] === 'deleteCommentValidation')
    {
        if (isset($_GET['commentId']) && filter_var($_GET['commentId'], FILTER_VALIDATE_INT) > 0) 
        {
            $adminView->deleteCommentValidation($_GET['commentId']);
        }
        else 
        {
            header('Location: http://localhost/Projet_4/index.php?action=error');
        }
    }

    elseif($_GET['action'] === 'report')
    {
        if(isset($_GET['reportId']) && filter_var($_GET['reportId'], FILTER_VALIDATE_INT) > 0)
        {
            $userView->report($_GET['reportId']);
        }
        else 
        {
            header('Location: http://localhost/Projet_4/index.php?action=error');
        }
    }

    elseif($_GET['action'] === 'legal')
    {
        $userView->legal();
    }


    elseif($_GET['action'] === 'reportedComments')
    {
        $adminView->allReportedComments();
    }


    else {
        $userView->error();
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