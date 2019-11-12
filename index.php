<?php session_start(); 

<<<<<<< HEAD
<!-- ROUTEUR -->

<?php
=======
// ROUTEUR

>>>>>>> 5713764... Modification de la logique de redirection, car non-applicable sur un serveur qui n'est pas local.
require_once('controllers/frontend/UserController.php'); 
require_once('controllers/backend/AdminController.php'); 

$userView = new UserController();
$adminView = new AdminController();

if (isset($_GET['action'])) {
    try 
    {
<<<<<<< HEAD
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
            header('Location:https://www.alpha-gecko.com/Projet_4/index.php?action=error');
        }
    }


    elseif ($_GET['action'] === 'addComment') 
    { 

        if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
        {

            if (!empty($_POST['author']) && !empty($_POST['comment'])) 
            {
                $userView->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
=======
        if ($_GET['action'] === 'BillsList' || $_GET['action'] === 'allBills') 
        {
            $userView->billsList();
        }
    
        elseif ($_GET['action'] === 'bill' && !isset($_GET['comment'])) 
        {
            if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
            { 
                $userView->bills();
>>>>>>> 5713764... Modification de la logique de redirection, car non-applicable sur un serveur qui n'est pas local.
            }

            else 
            {
                $userView->error();
            }
        }
<<<<<<< HEAD
        
        else 
=======
    
    
        elseif ($_GET['action'] === 'bill' && $_GET['comment'] === 'addComment') 
        { 
            if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
            {
    
                if (!empty($_POST['author']) && !empty($_POST['comment'])) 
                {
                    $userView->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    $userView->bills();
                }
                else 
                {
                    $userView->error();
                }
            }
            else 
            {
                $userView->error();
            }
        }
    
        elseif($_GET['action'] === 'admin' && !isset($_GET['validation'])) 
>>>>>>> 5713764... Modification de la logique de redirection, car non-applicable sur un serveur qui n'est pas local.
        {
            $adminView->adminLogin();
        }
    
        elseif($_GET['action'] === 'admin' && $_GET['validation'] === 'isAdmin' && isset($_POST['admin_id']) && isset($_POST['admin_password'])) 
        {
            $adminView->adminLogin();
            $data = $adminView->adminDatas->fetch();
            $adminName = $data['admin_name']; 
            $adminPassword = $data['admin_password'];
    
            if (htmlspecialchars($_POST['admin_id']) === $adminName && htmlspecialchars($_POST['admin_password']) === $adminPassword)
            {
                $_SESSION['admin'] = $data['admin_pseudo'];
<<<<<<< HEAD
                header('Location:https://www.alpha-gecko.com/Projet_4/'); 
=======
                $adminView->adminPanel();
>>>>>>> 5713764... Modification de la logique de redirection, car non-applicable sur un serveur qui n'est pas local.
            } 
            else 
            {
                $userView->error();
            }
        }
<<<<<<< HEAD
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
            header('Location:https://www.alpha-gecko.com/Projet_4/index.php?action=error');
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
            header('Location:https://www.alpha-gecko.com/Projet_4/index.php?action=error');
=======
    
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
                throw new Exception('Vous devez impérativement poster un titre et un contenu. Faites "précédent" pour ne pas perdre votre travail.');
            }
>>>>>>> 5713764... Modification de la logique de redirection, car non-applicable sur un serveur qui n'est pas local.
        }
    
        elseif($_GET['action'] === 'deconnexion')
        {
            $adminView->deconnexion();
        }
    
        elseif ($_GET['action'] === 'editBill')
        {
<<<<<<< HEAD
            header('Location:https://www.alpha-gecko.com/Projet_4/index.php?action=error');
=======
            if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
            { 
                $adminView->editBill();
            } 
            else 
            {
                throw new Exception('Veuillez ne jamais modifier manuellement l\'URL de votre navigateur. Faites "précédent" pour ne pas perdre votre travail.');
            }
>>>>>>> 5713764... Modification de la logique de redirection, car non-applicable sur un serveur qui n'est pas local.
        }
    
        elseif($_GET['action'] === 'editionValidation')
        {
            if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
            {
                $adminView->editionValidation($_GET['id']);
            }
            else 
            {
                throw new Exception('Veuillez ne jamais modifier manuellement l\'URL de votre navigateur. Faites "précédent" pour ne pas perdre votre travail.');
            }
        }
    
        elseif($_GET['action'] === 'deleteValidation')
        {
<<<<<<< HEAD
            header('Location:https://www.alpha-gecko.com/Projet_4/index.php?action=error');
=======
            if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
            {
                $adminView->deleteValidation($_GET['id']);
            }
            else 
            {
                throw new Exception('Veuillez ne jamais modifier manuellement l\'URL de votre navigateur. Faites "précédent" pour ne pas perdre votre travail.');
            }
>>>>>>> 5713764... Modification de la logique de redirection, car non-applicable sur un serveur qui n'est pas local.
        }
    
        elseif($_GET['action'] === 'editComment')
        {
            if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
            {
                $adminView->adminBills();
            }
            else 
            {
                throw new Exception('Veuillez ne jamais modifier manuellement l\'URL de votre navigateur. Faites "précédent" pour ne pas perdre votre travail.');
            }
        }
    
        elseif($_GET['action'] === 'deleteCommentValidation')
        {
<<<<<<< HEAD
            header('Location:https://www.alpha-gecko.com/Projet_4/index.php?action=error');
=======
            if (isset($_GET['commentId']) && filter_var($_GET['commentId'], FILTER_VALIDATE_INT) > 0) 
            {
                $adminView->deleteCommentValidation($_GET['commentId']);
            }
            else 
            {
                throw new Exception('Veuillez ne jamais modifier manuellement l\'URL de votre navigateur. Faites "précédent" pour ne pas perdre votre travail.');
            }
>>>>>>> 5713764... Modification de la logique de redirection, car non-applicable sur un serveur qui n'est pas local.
        }
    
        elseif($_GET['action'] === 'report')
        {
            if(isset($_GET['reportId']) && filter_var($_GET['reportId'], FILTER_VALIDATE_INT) > 0)
            {
                $userView->report($_GET['reportId']);
            }
            else 
            {
                throw new Exception('Veuillez ne jamais modifier manuellement l\'URL de votre navigateur. Faites "précédent" pour ne pas perdre votre travail.');
            }
        }
    
        elseif($_GET['action'] === 'legal')
        {
<<<<<<< HEAD
            header('Location:https://www.alpha-gecko.com/Projet_4/index.php?action=error');
=======
            $userView->legal();
>>>>>>> 5713764... Modification de la logique de redirection, car non-applicable sur un serveur qui n'est pas local.
        }
    
    
        elseif($_GET['action'] === 'reportedComments')
        {
            $adminView->allReportedComments();
        }
<<<<<<< HEAD
        else 
        {
            header('Location:https://www.alpha-gecko.com/Projet_4/index.php?action=error');
=======
    
    
        else {
            $userView->error();
>>>>>>> 5713764... Modification de la logique de redirection, car non-applicable sur un serveur qui n'est pas local.
        }
        
    }

    catch (Exception $e)
    {
        var_dump($e->getMessage());
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