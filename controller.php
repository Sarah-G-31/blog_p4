<?php
require('model.php');

function tickets()
{
    $tickets = ticketsList();

    require('ticketsListView.php');
}

function comments()
{
    $ticket = ticket($_GET['id']);
    $comments = getComments($_GET['id']);

    if (empty($ticket['id']))
    { 
        require('errorView.php');
    } 
    else 
    {
        require('commentView.php');
    }
}