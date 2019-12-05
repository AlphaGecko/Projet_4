<?php

require_once("DbManager.php");
class CommentManager
{
    
    public function getComments($billId)
    {
        $comments = DbManager::dbConnect()->prepare('SELECT id, comment_author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') 
        AS comment_date_fr FROM comments WHERE bill_id = ? ORDER BY comment_date DESC');

        $comments->execute(array($billId));

        return $comments;
    }

    public function getCommentId($commentId)
    {
        $comment = DbManager::dbConnect()->prepare('SELECT id FROM comment WHERE id = ?'); 
        $comment->execute(array($commentId));
        return $comment;
    }

    public function postComment($billId, $author, $comment)
    {
        $comments = DbManager::dbConnect()->prepare('INSERT INTO comments(bill_id, comment_author, comment, comment_date) 
        VALUES(?, ?, ?, NOW())');
        
        $affectedLines = $comments->execute(array($billId, $author, $comment));

        return $affectedLines;
    }

    public function deleteComment($commentId)
    {
        $deleteComment = DbManager::dbConnect()->prepare('DELETE FROM comments WHERE id = ?');
        $deleteComment->execute(array($commentId));
    }

    public function updateReport($commentId)
    {  
        $updateComment = DbManager::dbConnect()->prepare('UPDATE comments SET report = report + 1 WHERE id = ?');
        $updateComment->execute(array($commentId));
    }

    public function cancelReport($commentId)
    {  
        $updateComment = DbManager::dbConnect()->prepare('UPDATE comments SET report = 0 WHERE id = ?');
        $updateComment->execute(array($commentId));
    }

    public function getReportedComments()
    {
        $allComments = DbManager::dbConnect()->query('SELECT id, comment_author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') 
        AS comment_date_fr FROM comments WHERE report > 0 ORDER BY comment_date DESC'); 
        
        return $allComments;
    }

    public function allComments()
    {
        $allComments = DbManager::dbConnect()->query('SELECT id, comment_author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') 
        AS comment_date_fr FROM comments ORDER BY comment_date DESC'); 
        
        return $allComments;
    }
}
