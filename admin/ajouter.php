<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>

        <h2>Ajouter un billet</h2>

        <a href="admin.php"><h4>Retour au menu principal</h4></a>

        <form action="post_billet.php" method="post">
            <div class="news">
                <h3>Titre :<br />
                    <textarea id="titre" name="titre" rows="1" cols="163" required></textarea>
                </h3>
                <p class="news p">
                    <label for="contenu">Message : </label><br />
                    <textarea id="contenu" name="contenu" rows="5" cols="163" required></textarea><br />
                    <input  type="submit" value="Valider">
                </p>
            </div>
        </form>

    </body>
</html>






