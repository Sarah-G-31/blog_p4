<?php
setcookie('auteur',$_POST['auteur'], time() + 365*24*3600, null, null, false, true); // Créer un cookie(garde en mémoire dans la machine de l'utilisateur) avec le nom de l'auteur(pseudo) pour 1 an
session_start(); // Démarre la session de cookie
?>

<?php
include('connexion_bdd.php');
    
$url = $_POST['id_billet'];
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire) VALUES(:id_billet, :auteur, :commentaire)');
$req->execute(array(
	'id_billet' => htmlspecialchars($_POST['id_billet']),        
	'auteur' => htmlspecialchars($_POST['auteur']),
	'commentaire' => htmlspecialchars($_POST['commentaire'])
    ));
// Redirection vers commentaires.php du billet concerné (et comme nous sommes sur commentaires.php le formulaire affichera les commentaires)       
header("Location: commentaires.php?billet=$url");
?>