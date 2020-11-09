<?php
session_start();
if (isset($_SESSION['id_groupe']) AND $_SESSION['id_groupe'] == 2 OR $_SESSION['id_groupe'] == 3)
{
    include('../connexion_bdd.php');

    $message = "Message supprimé car son contenu ne correspond pas aux conformités de notre forum.";
    $signalement = 0;

    $req = $bdd->prepare('UPDATE commentaires SET commentaire = :commentaire, signalement = :signalement WHERE id = :id');
    $req->execute(array(
        'commentaire' => $message,
        'signalement' => $signalement,
        'id' => $_GET['commentaire']
        ));

    header('Location: admin.php');
}
?>