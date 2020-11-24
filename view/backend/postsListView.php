<?php
$title = 'Modification post';
ob_start(); ?>

<h2>Modifier un post</h2>

<a href="index.php?admin=menu"><h4>Retour au menu principal</h4></a>

<?php
while($post = $posts->fetch())
{
?>
<div class="news">
    <a href="index.php?admin=editPosts&amp;id=<?= $post['id']; ?>" >
        <h3><?= $post['title']; ?><i> le <?= $post['date']; ?></i></h3>
        <p class="news p">
            <?= nl2br($post['content']); ?><br />
        </p><br />
    </a>
</div>
<?php
}
$posts->closeCursor();
?>

<?php
$content = ob_get_clean();
require('template.php');
?>