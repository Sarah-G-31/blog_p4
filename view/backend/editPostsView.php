<?php
$title = 'Modification post';
ob_start(); ?>

<h2>Vous modifiez le post n°<?= $post['id']; ?> !</h2>

<a href="index.php?admin=editPosts"><h4>Retour à la liste des posts</h4></a>
                    
<div class="news">
    <form action="post_modif_billet.php" method="post">
        <p>
            <h3>Titre :<br />
                <textarea id="title" name="title" rows="1" cols="144" required><?= $post['title']; ?></textarea>
            </h3>
            <p class="news p">
                <label for="contenu">Message : </label><br />
                <textarea id="content" name="content" rows="7" cols="144" required><?= $post['content']; ?></textarea><br />
                <input type="hidden" id="id" name="id" value="<?= $post['id']; ?>">
                <input  type="submit" value="Valider">
                <input type="button" value="Annuler" onclick="window.location.href='index.php?admin=editPosts';">
            </p>
        </p>
    </form>
</div>

<?php
$content = ob_get_clean();
require('template.php');
?>