<?php 

class ConnexionManager extends DbManager
{
    public function getAdmin() 
    {
    
    $db = $this->dbConnect();

    $req = $db->query('SELECT * FROM admin_log');

    return $req;
    }
}