<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/adminstyle.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <div class="buttons">
            <input type="button" onclick="window.location.href='index.php';" value="Quitter">
            <input type="button" onclick="window.location.href='index.php?action=disconnection';" value="Deconnexion">
        </div>
        <?= $content ?>
    </body>
</html>