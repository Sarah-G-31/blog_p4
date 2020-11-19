<?php

require_once("model/Manager.php");

class TicketManager extends Manager
{
    public function ticketsList()
    {
        $bdd = $this->bddConnect();
        
        $tickets = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM tickets ORDER BY id DESC');

        return $tickets;
    }

    public function ticket($ticketId)
    {
        $bdd = $this->bddConnect();

        $req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM tickets WHERE id = ?');
        $req->execute(array($ticketId));
        $ticket = $req->fetch();

        return $ticket;
    }
}