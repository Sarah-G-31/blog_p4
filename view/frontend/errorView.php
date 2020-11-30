<?php
$title = 'Mon Blog !';

ob_start();

$h1 = $errorMessage;

$content = ob_get_clean();
require('view/frontend/template.php');
?>