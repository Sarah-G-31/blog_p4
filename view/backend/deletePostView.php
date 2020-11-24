<?php
$title = 'Supprimer un post';
ob_start(); ?>

<h1 class="warning">Attention cette opération est irréversible</h1>

<a href="index.php?admin=deletePosts"><h4>Retour au menu précédent</h4></a>

<div class="news">
    <h3>
        <?= $post['title']; ?>
        <i> le <?= $post['date']; ?></i>
    </h3>
    <p class="news p">
        <?= nl2br($post['content']); ?><br />
    </p>
</div><br /><br />

<div class="news">Êtes vous sur de vouloir supprimer ce billet ?
    <input type="button" value="oui" onclick="window.location.href='delete_billet.php?billet=<?php echo $_GET['billet']; ?>';"> / 
    <input type="button" value="non" onclick="window.location.href='supprimer.php';">
</div><br />

<?php
$content = ob_get_clean();
require('template.php');
?>