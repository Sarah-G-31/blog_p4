<?php
$title = 'Billet simple pour l\'Alaska';

$h1 = $title;
ob_start(); ?>

<h4>Derniers billets du blog :</h4>

<?php
while($post = $posts->fetch()) 
{
?>
    <div class="posts">
        <h3>
            <?= $post['title']; ?>
        </h3>
        <i>Publié le <?= $post['date']; ?></i>
        <p>
            <?= $post['content']; ?><br />
            <a href="index.php?action=post&amp;id=<?= $post['id']; ?>"><i>Commentaires</i></a>
        </p>
    </div><br />
<?php
}
$posts->closeCursor();
$content = ob_get_clean();
require('template.php');
?>
