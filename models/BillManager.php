<?php

require_once("models/DbManager.php");

class BillManager extends DbManager
{
    public function getBills()
    {
        $bills = DbManager::dbConnect()->query('SELECT * FROM bills ORDER BY creation_date DESC LIMIT 0, 5');

        return $bills;
    }

    public function getOneBill($billId)
    {
        $req = DbManager::dbConnect()->prepare('SELECT * FROM bills WHERE id = ?');
        $req->execute(array($billId));
        
        $bill = $req->fetch();

        return $bill;
    }
}