<?php
session_start();
if (isset($_SESSION['id_groupe']) AND $_SESSION['id_groupe'] == 2)
{
    include('../connexion_bdd.php');

    $req = $bdd->prepare('UPDATE commentaires SET signalement = :signalement WHERE id = :id');
    $req->execute(array(
        'id' => $_GET['commentaire'],
        'signalement' => 0
        ));

    $req = $bdd->prepare('DELETE FROM signalement WHERE id_commentaire = :id');
    $req->execute(array('id' => $_GET['commentaire']));

    header('Location: admin.php');
}
?>