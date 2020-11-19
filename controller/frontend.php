<?php
require('model/frontend.php');

function tickets()
{
    $tickets = ticketsList();

    require('view/frontend/ticketsListView.php');
}

function comments()
{
    $ticket = ticket($_GET['id']);
    $comments = getComments($_GET['id']);

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
    $affectedLines = postComment($ticketId, $author, $comment);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=ticket&id=' . $ticketId);
    }
}