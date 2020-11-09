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

        <h2>Modifier un billet</h2>

        <a href="admin.php"><h4>Retour au menu principal</h4></a>

        <?php
        include('../connexion_bdd.php');

        $retour_billets = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM billets ORDER BY id DESC');

        while($donnees_billets = $retour_billets->fetch()) // On lit les entrées une à une grâce à une boucle
        {
        ?>
        <div class="news">
            <a href="modif_billet.php?billet=<?php echo $donnees_billets['id']; ?>" >
                <h3><?php echo $donnees_billets['titre']; ?><i> le <?php echo $donnees_billets['date']; ?></i></h3>
                <p class="news p">
                    <?php echo nl2br($donnees_billets['contenu']); ?><br />
                </p><br />
            </a>
        </div>
        <?php
        }
        $retour_billets->closeCursor();
        ?>

    </body>
</html>
<?php
}
?>