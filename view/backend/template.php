<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name = "description" content = "Blog de l'écrivain Jean Forteroche">
        <title><?= $title ?></title>
        <script type="text/javascript" src="public/js/tinymce/tinymce.min.js"></script>
        </script>
        <script type="text/javascript">
        tinymce.init({
            selector: '#content',
            language: "fr_FR",
            toolbar: 'undo redo | fontselect fontsizeselect forecolor | cut copy paste selectall | bold italic underline strikethrough | backcolor | alignleft aligncenter alignright alignjustify | outdent indent lineheight',
            menubar:false,
            statusbar: false,
        });
        </script>
        <link href="public/css/adminstyle.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <div class="buttons">
            <a href='index.php'>Quitter</a>
            <a href='index.php?action=disconnection'>Deconnexion</a>
        </div>
        <?= $content ?>
    </body>
</html>