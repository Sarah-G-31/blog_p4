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
?>

<form class="form_commentaire" action="index.php?action=addComment" method="post">
<p>
    <label type="text" id="auteur" name="auteur">Auteur</label>
    <input type="text" id="auteur" name="author" value="<?php if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) { echo $_SESSION['pseudo']; } ?>" required><br />
    <input type="hidden" id="id_billet" name="id" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>">
    <textarea class="commentaire" id="commentaire" name="comment" rows="7" cols="30" required>votre message</textarea>
    <input type="submit" value="Valider">
</p>
</form>

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
?>


