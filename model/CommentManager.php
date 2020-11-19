<?php

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($ticketId)
    {
        $bdd = $this->bddConnect();

        $comments = $bdd->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') date FROM comments WHERE id_tickets = ? ORDER BY id DESC');
        $comments->execute(array($ticketId));

        return $comments;
    }

    public function postComment($ticketId, $author, $comment)
    {
        $bdd = $this->bddConnect();

        $comments = $bdd->prepare('INSERT INTO comments (id_tickets, author, comment) VALUES (?, ?, ?)');
        $affectedLines = $comments->execute(array($ticketId, $author, $comment));

        return $affectedLines;
    }
}