<?php
$title = 'Supprimer un post';
ob_start(); ?>

<h2>Supprimer un post</h2>

<a href="index.php?admin=menu"><h4>Retour au menu principal</h4></a>

<?php
while($post = $posts->fetch())
{
?>
<div class="news">
    <a href="index.php?admin=deletePosts&amp;id=<?= $post['id']; ?>" >
        <h3>
            <?= $post['title']; ?>
            <i> le <?= $post['date']; ?></i>
        </h3>
        <p class="news p">
            <?= nl2br($post['content']); ?><br />
        </p><br />
    </a>
</div>
<?php
}
$posts->closeCursor();
$content = ob_get_clean();
require('template.php');
?>