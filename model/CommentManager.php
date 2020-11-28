<?php

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT com.id id, mem.pseudo author, com.comment comment, DATE_FORMAT(com.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') date FROM comments com LEFT JOIN members mem ON mem.id=com.author WHERE id_posts = ? ORDER BY id DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId,  $memberId, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments (id_posts, author, comment, report) VALUES (?, ?, ?, 0)');
        $affectedLines = $comments->execute(array($postId,  $memberId, htmlspecialchars($comment)));

        return $affectedLines;
    }

    public function getReports()
    {
        $db = $this->dbConnect();
        $reports = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM comments WHERE report = 1');
        $reports->execute();

        return $reports;
    }

    public function deleteComment($commentId)
    {
        $message = "Message supprimé car son contenu ne correspond pas aux conformités de notre forum.";

        $db = $this->dbConnect();
        $delete = $db->prepare('UPDATE comments SET comment = ?, report = 0 WHERE id = ?');
        $delete->execute(array($message, $commentId));
    
        return $delete;
    }

    public function cancelReport($commentId)
    {
        $db = $this->dbConnect();
        $cancel = $db->prepare('UPDATE comments SET report = 0 WHERE id = ?');
        $cancel->execute(array($commentId));
    
        return $cancel;
    }
}