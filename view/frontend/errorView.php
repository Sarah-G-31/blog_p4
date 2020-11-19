<?php
$title = 'Mon Blog !';

ob_start(); ?>

<h1><i><?= $errorMessage ?></i></h1>

<?php
$content = ob_get_clean();

require('view/frontend/template.php');
?>