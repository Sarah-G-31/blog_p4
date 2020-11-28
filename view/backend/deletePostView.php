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

<form action="index.php?admin=deletePosts" method="post">
    <div class="news">Êtes vous sur de vouloir supprimer ce post ?
        <input type="hidden" type="id" name="id" value="<?= $post['id'] ?>">
        <input class="yes" type="submit" name="submit" value="oui"> / 
        <a class="no" href='index.php?admin=deletePosts'>non</a>
    </div><br />
</form>

<?php
$content = ob_get_clean();
require('template.php');
?>