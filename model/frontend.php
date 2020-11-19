<?php

function ticketsList()
{
    $bdd = bddConnect();
    
    $tickets = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM tickets ORDER BY id DESC');

    return $tickets;
}

function ticket($ticketId)
{
    $bdd = bddConnect();

    $req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM tickets WHERE id = ?');
    $req->execute(array($ticketId));
    $ticket = $req->fetch();

    return $ticket;
}

function getComments($ticketId)
{
    $bdd = bddConnect();

    $comments = $bdd->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') date FROM comments WHERE id_tickets = ? ORDER BY id DESC');
    $comments->execute(array($ticketId));

    return $comments;
}

function postComment($ticketId, $author, $comment)
{
    $bdd = bddConnect();

    $comments = $bdd->prepare('INSERT INTO comments (id_tickets, author, comment) VALUES (?, ?, ?)');
    $affectedLines = $comments->execute(array($ticketId, $author, $comment));

    return $affectedLines;
}

function bddConnect()
{
    $bdd = new PDO('mysql:host=localhost;dbname=blog_p4;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}