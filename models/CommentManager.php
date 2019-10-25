<?php

require_once("models/DbManager.php");

class CommentManager
{
    
    public function getComments($billId)
    {
        $comments = DbManager::dbConnect()->prepare('SELECT id, comment_author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') 
        AS comment_date_fr FROM comments WHERE bill_id = ? ORDER BY comment_date DESC');

        $comments->execute(array($billId));

        return $comments;
    }

    public function postComment($billId, $author, $comment)
    {
        $comments = DbManager::dbConnect()->prepare('INSERT INTO comments(bill_id, comment_author, comment, comment_date) 
        VALUES(?, ?, ?, NOW())');

        $affectedLines = $comments->execute(array($billId, $author, $comment));

        return $affectedLines;
    }
}
