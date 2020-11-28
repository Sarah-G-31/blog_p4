<?php
$title = 'Administration';

ob_start(); ?>
        
<h1>Espace administrateur</h1>

<div class="title">Posts</div>

<div class="button">
    <a href="index.php?admin=addPosts">Ajouter</a>
    <a href="index.php?admin=editPosts">Modifier</a>
    <a href="index.php?admin=deletePosts">Supprimer</a>
</div>

<div class="title">Commentaires</div>

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