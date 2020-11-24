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
            <input id="delete" type="button" onclick="window.location.href='delete_commentaire.php?commentaire=<?= $report['id']; ?>';" value="Supprimer">
            <input id="cancel" type="button" onclick="window.location.href='annuler_signalement_commentaire.php?commentaire=<?= $report['id']; ?>';" value="Annuler">
        </p>
    </div>
<?php
}
$reports->closeCursor();
$content = ob_get_clean();
require('template.php');
?>