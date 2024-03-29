<?php 
class AdminController extends UserController
{

    private $_adminName;
    private $_adminPassword;
    private $_adminNickName;

    public function injectAdminDatas() 
    {
        $connexionManager = new ConnexionManager;
        $adminDatas = $connexionManager->getAdmin();
        $datas = $adminDatas->fetchAll();

        $hashedPasswords = [];
        $passwordsArray = array_column($datas, 'admin_password');
        $options = ['cost' => 10];

        for($i = 0; $i < count($passwordsArray); $i++)
        {
            $hashedPasswords[$i] = password_hash($passwordsArray[$i], PASSWORD_DEFAULT, $options);
        }

        $this->_adminName = array_column($datas, 'admin_name');
        $this->_adminPassword =  $hashedPasswords;
        $this->_adminNickName = array_column($datas, 'admin_pseudo');
    }

    public function getAdminName()
    {
        return $this->_adminName;
    }
    
    public function getAdminPassword()
    {
        return $this->_adminPassword;
    }
    
    public function getAdminNickName()
    {
        return $this->_adminNickName;
    }

    public function adminPanel()
    {
        if (isset($_SESSION['admin']))
        {
            $billManager = new BillManager; 
            $bills = $billManager->getBillsForAdmin();

            $commentManager = new CommentManager(); 
            $reports = $commentManager->getReportedComments();

            require_once('view/backend/adminPanelView.php');
        } 
    }

    public function allReportedComments()
    {
        if (isset($_SESSION['admin']))
        {
            $commentManager = new CommentManager();
            $reports = $commentManager->getReportedComments();

            require_once('view/backend/adminReportedCommentsView.php');
        }
    }

    public function adminBills()
    {
        $billManager = new BillManager();
        $commentManager = new CommentManager();
    
        $bill = $billManager->getOneBill($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
    
        require('view/backend/adminOneBillView.php');
    }

    public function addNewBill($title, $content, $author)
    {
        if (isset($_SESSION['admin']))
        {
            $DbLink = new BillManager();
            $DbLink->insertBill($title, $content, $author);
        }  
    }

    public function editBill()
    {
        if (isset($_SESSION['admin']))
        {
            $billManager = new BillManager;
            $bill = $billManager->getOneBill($_GET['id']);

            require_once('view/backend/adminEditView.php');
        }  
    }

    public function editionValidation($billID)
    {
        if (isset($_SESSION['admin']))
        {
            $billManager = new BillManager;
            $billManager->updateBill($billID);

            require_once('view/backend/adminValidationView.php');
        }  
    }

    public function deleteValidation($billID)
    {
        if (isset($_SESSION['admin']))
        {
            $billManager = new BillManager;
            $billManager->deleteBill($billID);
            
            require_once('view/backend/adminValidationView.php');
        }  
    }

    public function deleteCommentValidation($commentId)
    {
        if (isset($_SESSION['admin']))
        {
            $commentManager = new CommentManager;
            $commentManager->deleteComment($commentId);
            
            require_once('view/backend/adminValidationView.php');
        }  
    }

    public function cancelReportValidation($commentId)
    {
        if (isset($_SESSION['admin']))
        {
            $commentManager = new CommentManager;
            $commentManager->cancelReport($commentId);
            
            require_once('view/backend/adminValidationView.php');
        }  
    }

    public function LogView() 
    {
        require_once('view/backend/adminLoginView.php');
    }

    public function validation()
    {
        require_once('view/backend/adminValidationView.php');
    }

    public function deconnexion()
    {
        session_destroy();
        require_once('view/backend/deconnexionView.php');
    }

    public function adminError() 
    {
        require_once('view/backend/adminErrorView.php');
    }
}