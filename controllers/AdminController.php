<?php 

class AdminController extends UserController
{
    public $adminDatas;

    public function adminLogin() 
    {
        $this->adminDatas = $this->getAdmin();


        require('view/user/loginView.php');
    }
    
}