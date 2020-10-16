<?php
include('../connexion_bdd.php');

$req = $bdd->prepare('UPDATE billets SET titre = :titre, contenu = :contenu WHERE id = :id');
$req->execute(array(
    'id' => ($_POST['id']),
    'titre' => htmlspecialchars($_POST['titre']),
	'contenu' => htmlspecialchars($_POST['contenu'])
	));

header('Location: modifier.php');
?>