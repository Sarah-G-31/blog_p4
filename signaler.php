<?php
session_start();
if (isset($_SESSION['id_groupe']))
{
    include('connexion_bdd.php');

    $req= $bdd->prepare('SELECT id, auteur, signalement FROM commentaires WHERE id = ?');
    $req->execute(array($_GET['commentaire']));
    $donnees = $req->fetch();

    $increment = $donnees['signalement'] + 1;

    $req = $bdd->prepare('INSERT INTO signalement(id_commentaire, auteur_commentaire, pseudo_qui_signale) VALUES(:id_commentaire, :auteur_commentaire, :pseudo_qui_signale)');
    $req->execute(array(
	'id_commentaire' => $_GET['commentaire'],        
	'auteur_commentaire' => $donnees['auteur'],
	'pseudo_qui_signale' => $_SESSION['pseudo']
    ));

    $req = $bdd->prepare('UPDATE commentaires SET signalement = :signalement WHERE id = :id');
    $req->execute(array(
        'signalement' => $increment,
        'id' => $_GET['commentaire']
        ));

    $url = $_GET['billet'];
    header("Location: commentaires.php?billet=$url");
    $donnees->closeCursor();
}
?>