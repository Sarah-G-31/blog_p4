<?php

require_once("model/Manager.php");

class RegistrationManager extends Manager
{
    public function getPseudo($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo FROM members WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $pseudoControl = $req->fetch();

        return $pseudoControl;
    }

    public function getEmail($email)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT email FROM members WHERE email = ?');
        $req->execute(array($email));
        $emailControl = $req->fetch();

        return $emailControl;
    }

    public function addMember($pseudo, $password, $email)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO members (pseudo, password, email, admin) VALUES (?, ?, ?, 0)');
        $req->execute(array($pseudo, $password, $email));

        return $req;
    }
}