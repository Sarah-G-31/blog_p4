<?php
$title = 'Ajouter un post';
ob_start(); ?>

<h2>Ajouter un post</h2>

<a href="index.php?admin=menu"><h4>Retour au menu principal</h4></a>

<form action="index.php?admin=addPosts" method="post">
    <div class="news">
        <h3>Titre :<br />
            <textarea id="title" name="title" rows="1" cols="144" required></textarea>
        </h3>
        <p class="news p">
            <label for="content">Contenu : </label><br />
            <textarea id="content" name="content" rows="5" cols="144" required></textarea><br />
            <input type="submit" name="submit" value="Valider">
        </p>
    </div>
</form>

<?php
$content = ob_get_clean();
require('template.php');
?>