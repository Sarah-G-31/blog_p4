<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>

        <?php
        include('connexion_bdd.php');

        $retour_billet = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM billets WHERE id = ?');
        $retour_billet->execute(array($_GET['billet']));
        $donnees_billet = $retour_billet->fetch();
        if (empty ($donnees_billet['id']))
        { ?>
            <h1><i>Erreur ! Cette page n'existe pas !</i></h1><?php
        } 
        else 
        { ?>

            <h1>Mon super blog !</h1>

            <div class="nbpagesup"><?php include('nbpages_commentaires.php'); ?></div>

            <div class="boutons"><?php include('pseudo_et_boutons.php'); ?></div>

            <div class="billets"></div>

            <a href="index.php"><h4>Retour à la liste des billets</h4></a>

                <div class="news">
                    <h3><?php echo $donnees_billet['titre']; ?><i> le <?php echo $donnees_billet['date']; ?></i></h3>
                    <p class="news p">
                        <?php echo nl2br($donnees_billet['contenu']); ?><br />
                    </p>
                </div>

            <?php
            $retour_billet->closeCursor();

            $retour_commentaires = $bdd->prepare('SELECT com.id id, com.auteur auteur, com.commentaire commentaire, DATE_FORMAT(com.date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') date, sign.pseudo_qui_signale pseudo FROM commentaires com LEFT JOIN signalement sign ON sign.id_commentaire = com.id WHERE id_billet = ? ORDER BY id DESC LIMIT '.$premiereEntree.', '.$commentairesParPage.'');
            $retour_commentaires->execute(array($_GET['billet']));
            ?>

            <h2>Commentaires</h2>

            <?php
            while($donnees_messages = $retour_commentaires->fetch())
            { ?>
                <div class="texte">
                    <p><strong><?php echo $donnees_messages['auteur']; ?></strong> le <?php echo $donnees_messages['date'], $_SESSION['pseudo'], $donnees_messages['pseudo']; ?></p>
                    <p>
                        <?php echo nl2br($donnees_messages['commentaire']); ?>
                        <?php
                        $session_pseudo = $_SESSION['pseudo'];
                        $message = "Message supprimé car son contenu ne correspond pas aux conformités de notre forum.";
                        if (isset($_SESSION['id_groupe']) AND ($donnees_messages['commentaire'] != $message) AND ($donnees_messages['pseudo'] != $session_pseudo))
                        { ?>
                            <input id="signaler" type="button" onclick="window.location.href='signaler.php?billet=<?php echo $_GET['billet']; ?>&commentaire=<?php echo $donnees_messages['id']; ?>';" value="Signaler"><?php
                        }
                        if (isset($_SESSION['id_groupe']) AND ($donnees_messages['commentaire'] == $message) AND ($donnees_messages['pseudo'] != $session_pseudo))
                        { ?>
                            <input id="supprimer" value="Commentaire supprimé"><?php
                        }
                        if (isset($_SESSION['id_groupe']) AND ($donnees_messages['pseudo'] == $session_pseudo))
                        { ?>
                            <input id="deja_signaler" value="Commentaire signalé !"><?php
                        } ?>
                    </p>
                </div><?php
            }

            if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
            { ?>
                <form class="form_commentaire" action="post_commentaire.php" method="post">
                    <p>
                        <input type="hidden" id="auteur" name="auteur" value="<?php if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) { echo $_SESSION['pseudo']; } ?>" required>
                        <input type="hidden" id="id_billet" name="id_billet" value="<?php if(isset($_GET['billet'])) echo $_GET['billet']; ?>">
                        <textarea class="commentaire" id="commentaire" name="commentaire" rows="7" cols="30" required>votre message</textarea>
                        <input type="submit" value="Valider">
                    </p>
                </form><?php
            } ?>

            <div class="nbpagesdown"><?php include('nbpages_commentaires.php'); ?></div>
            
            <?php
            $retour_commentaires->closeCursor();
        }
        ?>
    </body>
</html>