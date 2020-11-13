<?php
require('model.php');

if (isset($_GET['ticket']) && $_GET['ticket'] > 0) { // Pourquoi faire "$_GET['ticket'] > 0" vu que ça ne protége que le 0 ou le rien
    $ticket = ticket($_GET['ticket']);
    $comments = getComments($_GET['ticket']);
    if (empty($ticket['id']))
    { 
        require('errorView.php');
    } 
    else 
    {
        require('commentView.php');
    }
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}

