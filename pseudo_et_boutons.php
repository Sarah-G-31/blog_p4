<span><?php if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) { echo 'Bonjour ' . $_SESSION['pseudo']; } ?></span>

<?php
if (isset($_SESSION['id_groupe']) AND $_SESSION['id_groupe'] == 1)
{ ?>
    <input id="deconnexion" type="button" onclick="window.location.href='deconnexion.php';" value="Deconnexion"><?php
}
if ((isset($_SESSION['id_groupe']) AND $_SESSION['id_groupe'] == 2) || (isset($_SESSION['id_groupe']) AND $_SESSION['id_groupe'] == 3))
{ ?>
    <input id="admin" type="button" onclick="window.location.href='admin/admin.php';" value="<?php echo $_SESSION['utilisateur']; ?>">
    <input id="deconnexion" type="button" onclick="window.location.href='deconnexion.php';" value="Deconnexion"><?php
}
else if (empty($_SESSION['id_groupe']))
{ ?>
    <input id="inscription" type="button" onclick="window.location.href='formulaire_inscription.php';" value="Inscription">
    <input id="connexion" type="button" onclick="window.location.href='connexion.php';" value="Connexion"><?php
}?>