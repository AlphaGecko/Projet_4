<?php 

require_once('models/ConnexionManager.php');

class AdminController extends UserController
{

    private $adminDatas;

    public function adminLogin() 
    {
        $isAdmin = new ConnexionManager(); 
        $this->adminDatas = $isAdmin->getAdmin();
        require('view/loginView.php');
    }

    public function adminCheck()
    {
        $data = $this->adminDatas->fetch();
        $adminName = $data['admin_name']; 
        $adminPassword = $data['admin_password'];

        if (isset($_POST['admin_id']) && isset($_POST['admin_password']))
        {
            if (htmlspecialchars($_POST['admin_id']) === $adminName && htmlspecialchars($_POST['admin_password']) === $adminPassword)
            {
                echo '<em> ok </em>';
            } 
            
            else 
            {
                echo '<em> Veuillez entrez un identifiant et un mot de passe administrateur. </em>';
            }
        }
    }
    
}