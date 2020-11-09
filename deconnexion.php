<?php
session_start();

$_SESSION = array();
session_destroy();

/*
// Suppression des cookies de connexion automatique
setcookie('login', '');
setcookie('pass_hache', '');
*/

header("Location: index.php");
?>