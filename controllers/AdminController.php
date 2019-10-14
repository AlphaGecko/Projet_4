<?php 

require_once('models/ConnexionManager.php');

class AdminController extends UserController
{
    public function adminLogin() {
        $isAdmin = new ConnexionManager(); 
        $isAdmin->getAdmin();
        require('view/loginView.php');
    }
}