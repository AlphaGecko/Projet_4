<?php

// Chargement des classes

require_once('models/BillManager.php');
require_once('models/CommentManager.php');
require_once('models/ConnexionManager.php');

class UserController extends ConnexionManager {

    public $userDatas;

    public function billsList()
    {
        $billManager = new BillManager(); 
        $bills = $billManager->getBills(); 
    
        require('view/user/billsView.php');
    }
    
    public function bills()
    {
        $billManager = new BillManager();
        $commentManager = new CommentManager();
    
        $bill = $billManager->getOneBill($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
    
        require('view/user/oneBillView.php');
    }
    
    public function addComment($billId, $author, $comment)
    {
        $commentManager = new CommentManager();
    
        $affectedLines = $commentManager->postComment($billId, $author, $comment);
    
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=bill&id=' . $billId);
        }
    }

    public function userLogin() 
    { 
        $this->userDatas = $this->getUser();

        require('view/user/userLoginView.php');
    }
}

