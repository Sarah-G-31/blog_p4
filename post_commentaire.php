<?php
setcookie('auteur',$_POST['auteur'], time() + 365*24*3600, null, null, false, true);
session_start();

include('connexion_bdd.php');

$req = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, signalement) VALUES(:id_billet, :auteur, :commentaire, :signalement)');
$req->execute(array(
	'id_billet' => htmlspecialchars($_POST['id_billet']),        
	'auteur' => htmlspecialchars($_POST['auteur']),
	'commentaire' => htmlspecialchars($_POST['commentaire']),
	'signalement' => 0
    ));

$url = $_POST['id_billet'];
header("Location: commentaires.php?billet=$url");
?>