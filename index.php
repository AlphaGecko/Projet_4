<?php session_start(); 

// ROUTEUR

require_once('controllers/frontend/UserController.php'); 
require_once('controllers/backend/AdminController.php'); 

$userView = new UserController();
$adminView = new AdminController();

if (isset($_GET['action'])) {

    try
    {
        // Users 

        if ($_GET['action'] === 'BillsList' || $_GET['action'] === 'allBills') 
        {
            $userView->billsList();
        }
    
        elseif ($_GET['action'] === 'bill' && !isset($_GET['comment'])) 
        {
            if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
            { 
                $userView->bills();
            }
            else 
            {
                $userView->error();
            }
        }
    
        elseif ($_GET['action'] === 'bill' && $_GET['comment'] === 'addComment') 
        { 
            if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) > 0) 
            {
    
                if (!empty($_POST['author']) && !empty($_POST['comment'])) 
                {
                    $userView->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    $userView->validation();
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
    
        elseif($_GET['action'] === 'admin') 
        {
            $adminView->LogView();
        }
    
        elseif($_GET['action'] === 'connexion') 
        {
            $adminView->adminDatas();
    
            if (htmlspecialchars($_POST['admin_name']) === $adminView->getAdminName() && htmlspecialchars($_POST['admin_password']) === $adminView->getAdminPassword())
            {
                $_SESSION['admin'] = $adminView->getAdminNickName();
                $adminView->adminPanel();
            } 
            else 
            {
                $userView->error();
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
                $userView->error();
            }
        }
    
        elseif($_GET['action'] === 'legal')
        {
            $userView->legal();
        }

        // Admin
    
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
                throw new Exception('Veuillez ne jamais modifier manuellement l\'URL de votre navigateur. Faites "précédent" pour ne pas perdre votre travail.');
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
                throw new Exception('Veuillez ne jamais modifier manuellement l\'URL de votre navigateur. Faites "précédent" pour ne pas perdre votre travail.');
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
                throw new Exception('Veuillez ne jamais modifier manuellement l\'URL de votre navigateur. Faites "précédent" pour ne pas perdre votre travail.');
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
                throw new Exception('Veuillez ne jamais modifier manuellement l\'URL de votre navigateur. Faites "précédent" pour ne pas perdre votre travail.');
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
                throw new Exception('Veuillez ne jamais modifier manuellement l\'URL de votre navigateur. Faites "précédent" pour ne pas perdre votre travail.');
            }
        }
    
        elseif($_GET['action'] === 'reportedComments')
        {
            $adminView->allReportedComments();
        }

        // Erreur
    
        else {
            $userView->error();
        }
    }
    catch (Exception $e)
    {
        echo 'Erreur : ' . $e->getMessage();
    }   
}

/* default views */ 

elseif (isset($_SESSION['admin']) && !isset($_GET['action']))
{
    $adminView->adminPanel();
}

elseif (!isset($_SESSION['admin']) && !isset($_GET['action'])) 
{
    $userView->billsList();
}