<?php
require_once('model/TicketManager.php');
require_once('model/CommentManager.php');

function tickets()
{
    $ticketManager = new TicketManager(); // Création d'un objet
    $tickets = $ticketManager->ticketsList(); // Appel d'une fonction de cet objet

    require('view/frontend/ticketsListView.php');
}

function comments()
{
    $ticketManager = new TicketManager();
    $commentManager = new CommentManager();

    $ticket = $ticketManager->ticket($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    if (empty($ticket['id']))
    { 
        throw new Exception('Ce billet n\'existe pas !');
    } 
    else 
    {
        require('view/frontend/commentView.php');
    }
}

function addComment($ticketId, $author, $comment)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($ticketId, $author, $comment);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=ticket&id=' . $ticketId);
    }
}