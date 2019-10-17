<?php 

class AdminController extends UserController
{
    public $adminDatas;

    public function adminLogin() 
    {
        $this->adminDatas = $this->getAdmin();


        require_once('view/user/adminLoginView.php');
    }

    public function adminPanel()
    {
        require_once('view/admin/adminPanelView.php');
    }

}