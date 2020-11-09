<?php
session_start();
if ((isset($_SESSION['id_groupe']) AND $_SESSION['id_groupe'] == 2) || (isset($_SESSION['id_groupe']) AND $_SESSION['id_groupe'] == 3))
{
    include('connexion_bdd.php');

    $message = "Message supprimé car son contenu ne correspond pas aux conformités de notre forum.";

    $req = $bdd->prepare('UPDATE commentaires SET commentaire = :commentaire WHERE id = :id');
    $req->execute(array(
        'commentaire' => $message,
        'id' => $_GET['commentaire']
        ));

    $url = $_GET['billet'];
    header("Location: commentaires.php?billet=$url");
}
?>