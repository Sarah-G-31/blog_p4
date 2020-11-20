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

    if (empty($ticket['id'])) { 
        throw new Exception('Ce billet n\'existe pas !');
    } 
    else {
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

function connection()
{
    $erreurs = array();
    $input_value = array();

    // Contrôle du pseudo
    if (!empty($_POST['pseudo'])) {
        $pseudo = strip_tags($_POST['pseudo']);
        $input_value['pseudo'][] = $pseudo;
    }
    else {
        $erreurs['pseudo'][] = "Pseudo obligatoire";
    }

    // Contrôle du mots de passe
    $mdp = $_POST['mdp'];
    if (empty($mdp)) {
        $erreurs['mdp'][] = "Le mot de passe est obligatoire"; 
    }
    
    $_SESSION["input_value"] = $input_value;
    $_SESSION["erreurs"] = $erreurs;
    header("location: index.php?action=connection");

    if (count($erreurs) == 0) {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog_p4_members_space;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        
        $controle = $bdd->prepare('SELECT m.id id, m.id_groupe id_groupe, m.pass pass, g.utilisateur utilisateur FROM membres m LEFT JOIN groupes g ON g.id = m.id_groupe WHERE pseudo = :pseudo');
        $controle->execute(array('pseudo' => $pseudo));
        $donnees_controle = $controle->fetch();

        if (!$donnees_controle)
        {
            $erreurs['mdp'][] = "Mauvais identifiant ou mot de passe !";
            $_SESSION["erreurs"] = $erreurs;
            header("location: index.php?action=connection");
        }
        else if (password_verify($mdp, $donnees_controle['pass']))
        {
            $_SESSION['id'] = $donnees_controle['id'];
            $_SESSION['id_groupe'] = $donnees_controle['id_groupe'];
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['utilisateur'] = $donnees_controle['utilisateur'];
            header("location: index.php");
        }
        else
        {
            $erreurs['mdp'][] = "Mauvais identifiant ou mot de passe !";
            $_SESSION["erreurs"] = $erreurs;
            header("location: index.php?action=connection");
        }        
    }
}

function disconnection()
{
    $_SESSION = array();
    session_destroy();

    header("Location: index.php");
}