<?php
session_start();
if (isset($_SESSION['id_groupe']) AND $_SESSION['id_groupe'] == 2)
{
    include('../connexion_bdd.php');

    $req = $bdd->prepare('DELETE FROM billets WHERE id = :id');
    $req->bindParam(':id', $_GET['billet'], PDO::PARAM_INT);
    $req->execute();

    header('Location: supprimer.php');
}
?>