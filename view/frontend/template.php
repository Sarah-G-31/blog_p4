<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <header>
            <div id="name">Jean Forteroche</div>
            <a type="button" id="home" title="Accueil" href="index.php"></a>
            <h1><?= $h1 ?></h1>
            <div class="buttons">
                <?php
                if (isset($_SESSION['admin'])){
                    if( $_SESSION['admin'] == 1) { ?>
                    <a id="admin" href='index.php?admin=menu'>Admin</a><?php
                    } ?>
                    <a id="disconnection" href='index.php?action=disconnection'>Déconnexion</a><?php
                }
                else if (empty($_SESSION['id']) AND (isset($_GET['action']) AND $_GET['action'] == 'connection')) { ?>
                    <a id="registration" href='index.php?action=registration'>Inscription</a><?php
                }
                else if (empty($_SESSION['id']) AND (isset($_GET['action']) AND $_GET['action'] == 'registration')) { ?>
                    <a id="disconnection" href='index.php?action=connection'>Connexion</a><?php
                }
                else { ?>
                    <a id="disconnection" href='index.php?action=connection'>Connexion</a>
                    <a id="registration" href='index.php?action=registration'>Inscription</a><?php
                }
                ?>
            </div>
            <p class="hello" >
                <?php if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) { echo 'Bonjour ' . $_SESSION['pseudo']; } ?>
            </p>
        </header>

        <div class="content">
        <?= $content ?>
        </div>

        <footer>
            <nav>
                Plan du site
                <ul>
                    <li><a href="#">Navigation</a></li>
                    <li><a href="#">Auteur</a></li>
                    <li><a href="#">Mes autres romans</a></li>
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

            <nav id="copyright">
                ©Copyright 2020 par Sarah Garrigue. Tous droits réservés.
            </nav>
        </footer>
    </body>
</html>