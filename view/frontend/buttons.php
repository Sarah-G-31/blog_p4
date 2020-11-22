<span><?php if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) { echo 'Bonjour ' . $_SESSION['pseudo']; } ?></span>

<?php
if (isset($_SESSION['admin']) AND $_SESSION['admin'] == 0)
{ ?>
    <input id="deconnexion" type="button" onclick="window.location.href='index.php?action=disconnection';" value="Deconnexion"><?php
}
if (isset($_SESSION['admin']) AND $_SESSION['admin'] == 1)
{ ?>
    <input id="admin" type="button" onclick="window.location.href='admin/admin.php';" value="Admin">
    <input id="deconnexion" type="button" onclick="window.location.href='index.php?action=disconnection';" value="Deconnexion"><?php
}
if (empty($_SESSION['id']))
{ ?>
    <input id="inscription" type="button" onclick="window.location.href='formulaire_inscription.php';" value="Inscription">
    <input id="connexion" type="button" onclick="window.location.href='index.php?action=connection';" value="Connexion"><?php
}?>