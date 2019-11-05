<?php

require_once("models/DbManager.php");

class BillManager extends DbManager
{
    public function getBills()
    {
        $bills = DbManager::dbConnect()->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') 
        AS creation_date_fr, author FROM bills ORDER BY creation_date DESC LIMIT 0, 10');

        return $bills;
    }

    public function getBillsForAdmin() 
    {
        $allBills = DbManager::dbConnect()->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') 
        AS creation_date_fr, author FROM bills ORDER BY creation_date DESC');

        return $allBills;
    }

    public function getOneBill($billId)
    {
        $req = DbManager::dbConnect()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') 
        AS creation_date_fr, author FROM bills WHERE id = ?');
        $req->execute(array($billId));

        $bill = $req->fetch(PDO::FETCH_ASSOC);

        return $bill;
    }

    public function insertBill($title, $content, $author) 
    {
        $newBill = DbManager::dbConnect()->prepare('INSERT INTO bills(title, content, author, creation_date) 
        VALUES(?, ?, ?, NOW())');
        $newBill->execute(array($title, $content, $author));
    }

    public function updateBill($billID)
    {
        $updateBill = DbManager::dbConnect()->prepare('UPDATE bills SET title = :newTitle, content = :newContent WHERE id =' .$billID);
        $updateBill->execute(array('newTitle' => $_POST['title'], 'newContent' => $_POST['content']));
    }

    public function deleteBill($billID)
    {
        $deleteBill = DbManager::dbConnect()->prepare('DELETE FROM bills WHERE id = ?');
        $deleteBill->execute(array($billID));
    }
}