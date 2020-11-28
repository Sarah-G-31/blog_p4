<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <div class="buttons">
            <span><?php if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) { echo 'Bonjour ' . $_SESSION['pseudo']; } ?></span>

            <?php
            if (isset($_SESSION['admin']) AND $_SESSION['admin'] == 0) { ?>
                <a id="disconnection" href='index.php?action=disconnection'>Déconnexion</a><?php
            }
            if (isset($_SESSION['admin']) AND $_SESSION['admin'] == 1) { ?>
                <a id="admin" href='index.php?admin=menu'>Admin</a>
                <a id="disconnection" href='index.php?action=disconnection'>Déconnexion</a><?php
            }
            if (empty($_SESSION['id'])) { ?>
                <a id="registration" href='index.php?action=registration'>Inscription</a>
                <a id="disconnection" href='index.php?action=connection'>Connexion</a>
                <?php
            }?>
        </div>
        <?= $content ?>
    </body>
</html>