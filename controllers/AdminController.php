<?php 

require_once('models/ConnexionManager.php');
class AdminController 
{
    public $adminDatas;

    public function adminLogin() 
    {
        $datas = new ConnexionManager;
        $this->adminDatas = $datas->getAdmin();


        require_once('view/user/adminLoginView.php');
    }

    public function adminPanel()
    {
        if (isset($_SESSION['admin']))
        {
            require_once('view/admin/adminPanelView.php');
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

    public function modifyBill($billId)
    {
        if (isset($_SESSION['admin']))
        {
            $DbLink = new BillManager();
            $DbLink->updateBill($billId);
        }  
    }

    public function validation()
    {
        require_once('view/admin/validationView.php');
    }
}