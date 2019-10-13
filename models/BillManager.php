<?php

require_once("models/DbManager.php");

class BillManager extends DbManager
{
    public function getBills()
    {
        $db = $this->dbConnect();

        $req = $db->query('SELECT * FROM bills ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getOneBill($billId)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM bills WHERE id = ?');
        $req->execute(array($billId));
        $bill = $req->fetch();

        return $bill;
    }
}