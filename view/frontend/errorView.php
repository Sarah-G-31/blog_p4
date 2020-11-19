<?php
$title = 'Mon Blog !';

ob_start(); ?>

<h1><i>Erreur ! Cette page n'existe pas !</i></h1>

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
?>