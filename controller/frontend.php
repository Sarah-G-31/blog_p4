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
        require('view/frontend/errorView.php');
    } 
    else 
    {
        require('view/frontend/commentView.php');
    }
}