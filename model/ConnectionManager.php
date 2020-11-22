<?php

require_once("model/Manager.php");

class ConnectionManager extends Manager
{
    public function connectionControl($pseudo)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, pseudo, password, admin FROM members WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $control = $req->fetch();

        return $control;
    }
}