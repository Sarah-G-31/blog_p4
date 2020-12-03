<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a class="test2" href='index.php'>Quitter</a>
            <a class="test2" href='index.php?action=disconnection'>Deconnexion</a>
        </div>
        <?= $content ?>
    </body>
</html>