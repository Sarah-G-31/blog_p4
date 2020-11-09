<?php
session_start();
if (isset($_SESSION['id_groupe']) AND $_SESSION['id_groupe'] == 2)
{
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>

        <h1 class="warning">Attention cette opération est irréversible</h1>

        <a href="supprimer.php"><h4>Retour au menu précédent</h4></a>

        <?php
        include('../connexion_bdd.php');

        $retour_billet = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM billets WHERE id = :id');
        $retour_billet->execute(array(
            'id' =>($_GET['billet'])
            ));
        $donnees_billets = $retour_billet->fetch();
       
        ?>
        <div class="news">
            <h3><?php echo $donnees_billets['titre']; ?><i> le <?php echo $donnees_billets['date']; ?></i></h3>
            <p class="news p">
                <?php echo nl2br($donnees_billets['contenu']); ?><br />
            </p>
        </div><br /><br />
        <?php

        $retour_billet->closeCursor();
        ?>        

        <div class="news">Êtes vous sur de vouloir supprimer ce billet ?
            <input type="button" value="oui" onclick="window.location.href='delete_billet.php?billet=<?php echo $_GET['billet']; ?>';"> / 
            <input type="button" value="non" onclick="window.location.href='supprimer.php';">
        </div><br />

    </body>
</html>
<?php
}
?>