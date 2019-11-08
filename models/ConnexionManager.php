<?php 

require_once('DbManager.php');
class ConnexionManager
{

    public function getAdmin() 
    {     
        $db = DbManager::dbConnect()->query('SELECT * FROM admin_log');
        return $db;
    }

    public function getUser()
    {
        $db = DbManager::dbConnect()->query('SELECT * FROM user_log');
        return $db;
    }
}