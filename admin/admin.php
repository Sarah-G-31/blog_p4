<?php
session_start();
if (isset($_SESSION['id_groupe']) AND $_SESSION['id_groupe'] == 2 OR $_SESSION['id_groupe'] == 3)
{
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>
        
        <h1>Espace administrateur</h1>

        <input class="admin_quitter" type="button" onclick="window.location.href='../index.php';" value="Quitter">

        <?php
        if (isset($_SESSION['id_groupe']) AND $_SESSION['id_groupe'] == 2)
        {
        ?>
            <div class="titre">Billets</div>

            <div class="bouton">
                <a href="ajouter.php">Ajouter</a>
                <a href="modifier.php">Modifier</a>
                <a href="supprimer.php">Supprimer</a>
            </div>
        <?php
        }
        ?>
        <?php include('commentaires_signaler.php'); ?>

    </body>
</html>

<?php
}
?>

