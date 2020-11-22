<?php

require_once("model/Manager.php");

class ReportManager extends Manager
{
    public function postReport($commentId)
    {
        $db = $this->dbConnect($commentId);
        $report = $db->prepare('UPDATE comments SET report = 1 WHERE id = ?');
        $report->execute(array($commentId));

        return $report;
    }

    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $req= $db->prepare('SELECT id_posts FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        $comment = $req->fetch();

        return $comment;
    }
}