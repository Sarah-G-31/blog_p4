<?php
function ticketsList()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog_p4;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    // Récupération de tous les billets dans la bdd
    $tickets = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM billets ORDER BY id DESC');

    require('affichageAccueil.php');
}
?>