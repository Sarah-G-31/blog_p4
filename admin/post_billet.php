<?php
include('../connexion_bdd.php');

$req = $bdd->prepare('INSERT INTO billets(titre, contenu) VALUES(:titre, :contenu)');
$req->execute(array(
    'titre' => htmlspecialchars($_POST['titre']),
	'contenu' => htmlspecialchars($_POST['contenu'])
	));

header('Location: admin.php');
?>