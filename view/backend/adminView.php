<?php
$title = 'Administration';

ob_start(); ?>
        
<h1>Espace administrateur</h1>

<div class="title">Posts</div>

<a class="add" href="index.php?admin=addPosts">Ajouter</a>

<?php
while($post = $posts->fetch())
{
?>
<div class="news">
    <div class="newsButtons">
        <a id="delete" href="index.php?admin=deletePosts&amp;id=<?= $post['id']; ?>">Supprimer</a>
        <a id="edit" href="index.php?admin=editPosts&amp;id=<?= $post['id']; ?>">Modifier</a>
    </div>
    <h3>
        <?= $post['title']; ?>
        <i> le <?= $post['date']; ?></i>
    </h3>
    <p class="news p">
        <?= nl2br($post['content']); ?><br />
    </p>
</div>
<?php
}
$posts->closeCursor();
?>

<div class="title">Signalements</div>

<?php
while($report = $reports->fetch())
{
?>
    <div class="text">
        <p>
            <strong><?= $report['author']; ?></strong> le <?= $report['date']; ?>
        </p>
        <p>
            <?= nl2br($report['comment']); ?>
            <a id="delete" href='index.php?admin=deleteComment&id=<?= $report['id']; ?>'>Supprimer</a>
            <a id="cancel" href='index.php?admin=cancelReport&id=<?= $report['id']; ?>'>Annuler</a>
        </p>
    </div>
<?php
}
$reports->closeCursor();
$content = ob_get_clean();
require('template.php');
?>