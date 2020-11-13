<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Mon Blog</title>
    </head>
    <body>

        <h1>Mon super blog !</h1>

        <h4>Derniers billets du blog :</h4>

        <?php
        // On lit et on affiche les entrées une à une grâce à une boucle
        while($data_tickets = $tickets->fetch()) 
        {
            ?>
            <div class="news">
                <h3><?= $data_tickets['title']; ?><i> le <?= $data_tickets['date']; ?></i></h3>
                <p class="news p">
                    <?= nl2br($data_tickets['content']); ?><br />
                    <a href="comments.php?ticket=<?= $data_tickets['id']; ?>"><i>Commentaires</i></a>
                </p><br />
            </div>
            <?php
        }
        $tickets->closeCursor();
        ?>

    </body>
</html>

