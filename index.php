<?php
session_start();
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) { // ici on demande ticket mais on pourait demander le login
        if ($_GET['action'] == 'posts') {
            posts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) { // Pourquoi faire "$_GET['id'] > 0" vu qu'il y aura toujours un id
                comments();
            } 
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_POST['id'])) { // if (isset($_GET['id']) && $_GET['id'] > 0) { Même question !!
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_POST['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'report') {
            if (isset($_SESSION['admin'])) {
                if (isset($_GET['comment'])) {
                    report($_GET['comment']);
                }
                else {
                    throw new Exception('Aucun identifiant !');
                }
            }
            else {
                throw new Exception('Vous devez être connecté pour signaler un commentaire !');
            }
        }
        elseif ($_GET['action'] == 'registration') {
            if (isset($_POST['submit'])) {
                registration();
            }
            else {
                require('view/frontend/registrationView.php');
            }
        }
        elseif ($_GET['action'] == 'connection') {
            if (isset($_POST['submit'])) {
                connection();
            }
            else {
                require('view/frontend/connectionView.php');
            }
        }
        elseif ($_GET['action'] == 'disconnection') {
            disconnection();
        }
    }
    else {
        posts(); // action par défaut
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}
