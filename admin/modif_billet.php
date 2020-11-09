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

        <h2>Vous modifiez le billet n°<?php echo $_GET['billet']; ?> !</h2>

        <?php
        include('../connexion_bdd.php');

        $retour_billet = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM billets WHERE id = ?');
        $retour_billet->execute(array($_GET['billet']));
        $donnees_billets = $retour_billet->fetch();
        if (empty ($donnees_billets['id']))
        {
            ?>
            <h1><i>Erreur ! Cette page n'existe pas !</i></h1>
            <?php
        } 
        else 
        {
            ?>
            <a href="modifier.php"><h4>Retour à la liste des billets</h4></a>
                    
            <div class="news">
                <form action="post_modif_billet.php" method="post">
                    <p>
                        <h3>Titre :<br />
                            <textarea id="titre" name="titre" rows="1" cols="163" required><?php echo $donnees_billets['titre']; ?></textarea>
                        </h3>
                        <p class="news p">
                            <label for="contenu">Message : </label><br />
                            <textarea id="contenu" name="contenu" rows="7" cols="163" required><?php echo $donnees_billets['contenu']; ?></textarea><br />
                            <input type="hidden" id="id" name="id" value="<?php echo $donnees_billets['id']; ?>">
                            <input  type="submit" value="Valider">
                            <input type="button" value="Annuler" onclick="window.location.href='modifier.php';">
                        </p>
                    </p>
                </form>
            </div>

            <?php
            $retour_billet->closeCursor();
        }
        ?>

    </body>
</html>
<?php
}
?>