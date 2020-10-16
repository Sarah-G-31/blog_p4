<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>


        <?php
        include('connexion_bdd.php');

        // Récupération du billet
        // Requête préparée car elle dépend d'un paramètre: l'id du billet (fourni par $_GET['billet']  qu'on a reçu dans l'URL).
        $retour_billet = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM billets WHERE id = ?');
        $retour_billet->execute(array($_GET['billet']));
        $donnees_billet = $retour_billet->fetch();
        if (empty ($donnees_billet['id'])) // Vérifie si le billet existe sur la page des commentaires
        {
            ?>
            <h1><i>Erreur ! Cette page n'existe pas !</i></h1> <!-- s'il n'existe pas message erreur -->
            <?php
        } 
        else 
        {
            ?>

            <h1>Mon super blog !</h1>

            <div><?php include('nbpages_commentaires.php'); ?></div>

            <a href="index.php"><h4>Retour à la liste des billets</h4></a>

                <!-- Affiche un seul billet -->
                <div class="news">
                    <h3><?php echo $donnees_billet['titre']; ?><i> le <?php echo $donnees_billet['date']; ?></i></h3>
                    <p class="news p">
                        <?php echo nl2br($donnees_billet['contenu']); ?><br />
                    </p>
                </div>

            <?php
            $retour_billet->closeCursor(); // Libération du curseur pour la prochaine requête, cela permet de "terminer" le traitement de la requête pour pouvoir traiter la prochaine
            ?>

            <h2>Commentaires</h2>

            <!--Récupération des commentaires -->
            <!--Cette requête récupère tous les commentaires liés au billet correspondant à l'id reçu dans l'URL. Les commentaires sont triés par date croissante -->
            <?php
            $retour_commentaires = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM commentaires WHERE id_billet = ? ORDER BY id DESC LIMIT '.$premiereEntree.', '.$commentairesParPage.'');
            $retour_commentaires->execute(array($_GET['billet']));

            while($donnees_messages = $retour_commentaires->fetch()) // On lit les entrées une à une grâce à une boucle
            {
            ?>
                <div>
                    <strong><?php echo $donnees_messages['auteur']; ?></strong> le <?php echo $donnees_messages['date']; ?><br />
                    <p><?php echo nl2br($donnees_messages['commentaire']); ?></p>
                </div>
            <?php
            }
            ?>
            
            <br />
            <!-- Formulaire -->
            <form action="commentaire_post.php" method="post">
                <p>
                    <label for="auteur">Pseudo : </label>
                    <input type="text" id="auteur" name="auteur" value="<?php if(isset($_COOKIE['auteur'])) echo $_COOKIE['auteur']; ?>" required><br /><br />
                    <input type="hidden" id="id_billet" name="id_billet" value="<?php if(isset($_GET['billet'])) echo $_GET['billet']; ?>"> <!-- Valeur cachée -->
                    <label for="commentaire">Message : </label><br />
                    <textarea id="commentaire" name="commentaire" rows="7" cols="30" required></textarea><br />
                    <input  type="submit" value="Valider">
                </p>
            </form>

            <div><?php include('nbpages_commentaires.php'); ?></div>
            <?php

            $retour_commentaires->closeCursor();
        }
        ?>

    </body>
</html>