<?php
$title = 'Mon Blog !';

ob_start(); ?>

<h1>Mon super blog !</h1>

<a href="index.php"><h4>Retour à la liste des billets</h4></a>

<div class="news">
    <h3>
        <?= $ticket['title']; ?>
        <i> le <?= $ticket['date']; ?></i>
    </h3>
    <p class="news p">
        <?= nl2br($ticket['content']); ?><br />
    </p>
</div>

<h2>Commentaires</h2>

<?php
while($comment = $comments->fetch())
{ ?>
    <div class="texte">
        <p><strong><?= $comment['author']; ?></strong> le <?= $comment['date']; ?></p>
        <p>
            <?= nl2br($comment['comment']); ?>
        </p>
    </div><?php
} 
$comments->closeCursor();

$content = ob_get_clean();

require('template.php');
?>


