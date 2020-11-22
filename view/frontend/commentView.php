<?php
$title = 'Mon Blog !';

ob_start(); ?>

<h1>Mon super blog !</h1>

<a href="index.php"><h4>Retour à la liste des billets</h4></a>

<div class="buttons"><?php include ('buttons.php'); ?></div>

<div class="news">
    <h3>
        <?= $post['title']; ?>
        <i> le <?= $post['date']; ?></i>
    </h3>
    <p class="news p">
        <?= nl2br($post['content']); ?><br />
    </p>
</div>

<h2>Commentaires</h2>

<?php
while($comment = $comments->fetch())
{ ?>
    <div class="text">
        <p><strong><?= $comment['author']; ?></strong> le <?= $comment['date']; ?></p>
        <p>
            <?= nl2br($comment['comment']); ?>
        </p>
    </div><?php
} 
$comments->closeCursor();
?>

<form class="comment_form" action="index.php?action=addComment" method="post">
<p>
    <label type="text" id="author" name="author">Auteur</label>
    <input type="text" id="author" name="author" value="<?php if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) { echo $_SESSION['pseudo']; } ?>" required><br />
    <input type="hidden" id="id" name="id" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>">
    <textarea class="comment" id="comment" name="comment" rows="7" cols="30" placeholder="votre message" required></textarea>
    <input type="submit" value="Valider">
</p>
</form>

<?php
$content = ob_get_clean();

require('template.php');
?>


