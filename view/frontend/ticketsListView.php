<?php
$title = 'Mon Blog !';

ob_start(); ?>

<h1>Mon super blog !</h1>

<h4>Derniers billets du blog :</h4>

<div class="boutons"><?php include ('buttons.php'); ?></div>

<?php
// On lit et on affiche les entrées une à une grâce à une boucle
while($data_tickets = $tickets->fetch()) 
{
?>
    <div class="news">
        <h3>
            <?= $data_tickets['title']; ?>
            <i> le <?= $data_tickets['date']; ?></i>
        </h3>
        <p class="news p">
            <?= nl2br($data_tickets['content']); ?><br />
            <a href="index.php?action=ticket&amp;id=<?= $data_tickets['id']; ?>"><i>Commentaires</i></a>
        </p><br />
    </div>
    <?php
}
$tickets->closeCursor();

$content = ob_get_clean();

require('template.php');
?>
