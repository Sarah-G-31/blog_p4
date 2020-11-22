<?php
$title = 'Mon Blog !';

ob_start(); ?>

<h1>Mon super blog !</h1>

<h4>Derniers billets du blog :</h4>

<div class="buttons"><?php include ('buttons.php'); ?></div>

<?php
// On lit et on affiche les entrées une à une grâce à une boucle
while($post = $posts->fetch()) 
{
?>
    <div class="news">
        <h3>
            <?= $post['title']; ?>
            <i> le <?= $post['date']; ?></i>
        </h3>
        <p class="news p">
            <?= nl2br($post['content']); ?><br />
            <a href="index.php?action=post&amp;id=<?= $post['id']; ?>"><i>Commentaires</i></a>
        </p><br />
    </div>
    <?php
}
$posts->closeCursor();

$content = ob_get_clean();

require('template.php');
?>
