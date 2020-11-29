<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <header class="header">
            <div id="name">Jean Forteroche</div>
            
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
                    <a id="disconnection" href='index.php?action=connection'>Connexion</a>
                    <a id="registration" href='index.php?action=registration'>Inscription</a><?php
                }?>
            </div>
        </header>

        <?= $content ?>

        <footer class="footer">
            <nav>
                Plan du site
                <ul>
                    <li><a href="#">Navigation</a></li>
                    <li><a href="#">Qui nous sommes</a></li>
                    <li><a href="#">Ce que nous faisons</a></li>
                </ul>
            </nav>

            <nav>
                Contact
                <ul>
                    <li><a href="#">E-mail</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                </ul>
            </nav>

            <nav>
                ©Copyright 2020 par Sarah Garrigue. Tous droits réservés.
            </nav>
        </footer>
    </body>
</html>