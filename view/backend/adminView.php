<?php
$title = 'Administration';

ob_start(); ?>
        
<h1>Espace administrateur</h1>

<input class="closeAdmin" type="button" onclick="window.location.href='index.php';" value="Quitter">

<div class="title">Billets</div>

<div class="button">
    <a href="index.php?admin=addPosts">Ajouter</a>
    <a href="index.php?admin=editPosts">Modifier</a>
    <a href="index.php?admin=deletePosts">Supprimer</a>
</div>

<?php

//include('commentaires_signaler.php');

$content = ob_get_clean();

require('template.php');
?>