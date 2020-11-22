<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ConnectionManager.php');

function posts() {
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->postsList(); // Appel d'une fonction de cet objet

    require('view/frontend/postsListView.php');
}

function comments() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->post($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    if (empty($post['id'])) { 
        throw new Exception('Ce billet n\'existe pas !');
    } 
    else {
        require('view/frontend/commentView.php');
    }
}

function addComment($postId, $author, $comment) {
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function connection() {
    $errors = array();
    $input_value = array();

    // Contrôle du pseudo
    if (!empty($_POST['pseudo'])) {
        $pseudo = strip_tags($_POST['pseudo']);
        $input_value['pseudo'][] = $pseudo;
    }
    else {
        $errors['pseudo'][] = "Pseudo obligatoire";
    }

    // Contrôle du mots de passe
    $password = $_POST['password'];
    if (empty($password)) {
        $errors['password'][] = "Le mot de passe est obligatoire"; 
    }
    
    $_SESSION["input_value"] = $input_value;
    $_SESSION["errors"] = $errors;
    header("location: index.php?action=connection");

    if (count($errors) == 0) {

        $connectionManager = new ConnectionManager();
        $control = $connectionManager->connectionControl($pseudo);

        if (!$control)
        {
            $errors['password'][] = "Mauvais identifiant ou mot de passe !";
            $_SESSION["errors"] = $errors;
            header("location: index.php?action=connection");
        }
        else if (password_verify($password, $control['password']))
        {
            $_SESSION['id'] = $control['id'];
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['admin'] = $control['admin'];
            header("location: index.php");
        }
        else
        {
            $errors['password'][] = "Mauvais identifiant ou mot de passe !";
            $_SESSION["errors"] = $errors;
            header("location: index.php?action=connection");
        }        
    }
}

function disconnection() {
    $_SESSION = array();
    session_destroy();

    header("Location: index.php");
}