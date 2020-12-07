<?php
$title = 'Billet simple pour l\'Alaska';

$h1 = $post['title'];
ob_start(); ?>

<a href="index.php"><h4>Retour à la liste des billets</h4></a>

<div class="posts">
    <i> le <?= $post['date']; ?></i>
    <div>
        <?= $post['content']; ?>
    </div>
</div>

<h2>Commentaires</h2>

<?php
while($comment = $comments->fetch())
{ ?>
    <div class="comment">
        <p><strong><?= $comment['author']; ?></strong> le <?= $comment['date']; ?></p>
        <p>
            <?= nl2br($comment['comment']); ?>
            <?php
            if (isset($_SESSION['admin'])) { ?>
                <a id="report" href='index.php?action=report&post=<?= $post['id']; ?>&comment=<?= $comment['id']; ?>'>Signaler</a><?php
            } ?>
        </p>
    </div><?php
} 
$comments->closeCursor();

if (isset($_SESSION['admin']) AND $_SESSION['admin'] == 0) { ?>
<form class="commentForm" action="index.php?action=addComment" method="post">
    <p>
        <label class="title" type="title">laisser un commentaire</label><br />
        <input type="hidden" placeholder="Pseudo" value="<?php if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) { echo $_SESSION['pseudo']; } ?>" required>
        <input type="hidden" id="idPost" name="idPost" value="<?php if (isset($_GET['id'])) echo $_GET['id']; ?>">
        <input type="hidden" id="idMember" name="idMember" value="<?php if (isset($_SESSION['id'])) { echo $_SESSION['id']; } ?>">
        <textarea class="postComment" id="comment" name="comment" rows="7" cols="30" placeholder="votre message" required></textarea><br />
        <input type="submit" name="submit" value="Valider">
    </p>
</form>
<?php
} else { ?>
    <p class="commentHelp">
        <label class="title">Merci de vous connecter pour laisser un commentaire</label>
    </p>
<?php
}
$content = ob_get_clean();
require('template.php');
?>


