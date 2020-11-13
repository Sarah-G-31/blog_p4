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
    $tickets = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM tickets ORDER BY id DESC');

    return $tickets;
}