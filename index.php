<?php
require('controller.php');

if (isset($_GET['action'])) { // Pourquoi faire ?
    if ($_GET['action'] == 'tickets') {
        tickets();
    }
    elseif ($_GET['action'] == 'ticket') {
        if (isset($_GET['id']) && $_GET['id'] > 0) { // Pourquoi faire "$_GET['id'] > 0" vu qu'il y aura toujours un id
            comments();
        } 
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    tickets();
}