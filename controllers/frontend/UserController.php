<?php

// Chargement des classes

require_once('models/BillManager.php');
require_once('models/CommentManager.php');
require_once('models/ConnexionManager.php');

class UserController {

    public $userDatas;

    public function userLogin() 
    { 
        $datas = new ConnexionManager;
        $this->userDatas = $datas->getUser();

        require('view/frontend/userLoginView.php');
    }

    public function billsList()
    {
        $billManager = new BillManager();  

        if (!isset($_GET['action']))
        {
            $bills = $billManager->getFiveBills();
            require('view/frontend/billsView.php');
        }
        
        elseif($_GET['action'] === 'allBills')
        {
            $bills = $billManager->getBillsList();
            require('view/frontend/allBillsView.php');
        }
       
    }
    
    public function bills()
    {
        $billManager = new BillManager();
        $commentManager = new CommentManager();
        $bill = $billManager->getOneBill($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
    
        require('view/frontend/oneBillView.php');
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

    public function report($commentId)
    {
        $commentManager = new CommentManager(); 
        $commentManager->updateReport($commentId);

        require('view/frontend/validationView.php');
    }

    public function error() 
    {
        require('view/frontend/errorView.php');
    }

    public function legal() {
        require('view/frontend/legalView.php');
    }
}

