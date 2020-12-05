<?php
$title = 'Modification post';
ob_start(); ?>

<h2>Vous modifiez le post n°<?= $post['id']; ?> !</h2>

<a href="index.php?admin=menu"><h4>Retour à la liste des posts</h4></a>
                    
<div class="news">
    <form action="index.php?admin=editPosts" method="post">
        <p>
            <h3>Titre :<br />
                <textarea id="title" type="textarea" id="title" name="title" required><?= $post['title']; ?></textarea>
            </h3>
            <p>
                <label for="contenu">Message : </label><br />
                <textarea id="content" name="content" rows="35"><?= $post['content']; ?></textarea>
                <input type="hidden" id="id" name="id" value="<?= $post['id']; ?>">
                <input class="validate" type="submit" name="submit" value="Valider">
                <a class="cancel" href='index.php?admin=menu'>Annuler</a>
            </p>
        </p>
    </form>
</div>

<?php
$content = ob_get_clean();
require('template.php');
?>