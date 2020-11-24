<?php

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') date FROM comments WHERE id_posts = ? ORDER BY id DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments (id_posts, author, comment, report) VALUES (?, ?, ?, 0)');
        $affectedLines = $comments->execute(array($postId, htmlspecialchars($author), htmlspecialchars($comment)));

        return $affectedLines;
    }

    public function getReports()
    {
        $db = $this->dbConnect();
        $reports = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM comments WHERE report = 1');
        $reports->execute();

        return $reports;
    }
}