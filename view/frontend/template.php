<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <div id="name">Jean Forteroche</div>
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <div class="buttons">
            <?php if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) { echo 'Bonjour ' . $_SESSION['pseudo']; } ?>
            
            <?php
            if (isset($_SESSION['admin']) AND $_SESSION['admin'] == 0) { ?>
                <a id="disconnection" href='index.php?action=disconnection'>Déconnexion</a><?php
            }
            if (isset($_SESSION['admin']) AND $_SESSION['admin'] == 1) { ?>
                <a id="admin" href='index.php?admin=menu'>Admin</a>
                <a id="disconnection" href='index.php?action=disconnection'>Déconnexion</a><?php
            }
            if (empty($_SESSION['id'])) { ?>
                <input type="text" placeholder="Pseudo" required>
                <input type="text" placeholder="Mot de passe" required>
                <a id="disconnection" href='index.php?action=connection'>Connexion</a>
                <a id="registration" href='index.php?action=registration'>Inscription</a><?php
            }?>
        </div>
        <?= $content ?>
    </body>
</html>