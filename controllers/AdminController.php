<?php 
class AdminController extends UserController
{
    public $adminDatas;

    public function adminLogin() 
    {
        $datas = new ConnexionManager;
        $this->adminDatas = $datas->getAdmin();


        require_once('view/adminLoginView.php');
    }

    public function adminPanel()
    {
        if (isset($_SESSION['admin']))
        {
            $billManager = new BillManager; 
            $bills = $billManager->getBillsForAdmin();
            require_once('view/adminPanelView.php');

        }
        
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

            require_once('view/adminEditView.php');
        }  
    }

    public function editionValidation($billID)
    {
        if (isset($_SESSION['admin']))
        {
            $billManager = new BillManager;
            $billManager->updateBill($billID);

            require_once('view/validationView.php');
        }  
    }

    public function deleteValidation($billID)
    {
        if (isset($_SESSION['admin']))
        {
            $billManager = new BillManager;
            $billManager->deleteBill($billID);
            
            require_once('view/validationView.php');
        }  
    }

    public function validation()
    {
        require_once('view/validationView.php');
    }

    public function deconnexion()
    {
        session_destroy();
        require_once('view/deconnexion.php');
    }
}