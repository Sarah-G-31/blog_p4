<?php
require('controller/frontend.php');

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
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_POST['id'])) { // if (isset($_GET['id']) && $_GET['id'] > 0) { Même question !!
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_POST['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    tickets();
}