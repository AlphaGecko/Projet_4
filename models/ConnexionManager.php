<?php 

require_once('DbManager.php');
class ConnexionManager
{
    public function getAdmin() 
    {     
        $db = DbManager::dbConnect()->query('SELECT * FROM admin_log');
        return $db;
    }
}