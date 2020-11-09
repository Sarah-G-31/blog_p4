<?php
session_start();
if (isset($_SESSION['id_groupe']) AND $_SESSION['id_groupe'] == 2)
{
    include('../connexion_bdd.php');

    $req = $bdd->prepare('UPDATE billets SET titre = :titre, contenu = :contenu WHERE id = :id');
    $req->execute(array(
        'id' => ($_POST['id']),
        'titre' => htmlspecialchars($_POST['titre']),
        'contenu' => htmlspecialchars($_POST['contenu'])
        ));

    header('Location: modifier.php');
}
?>