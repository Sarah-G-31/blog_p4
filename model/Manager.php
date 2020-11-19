<?php

class Manager
{   
    protected function bddConnect()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog_p4;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
}
