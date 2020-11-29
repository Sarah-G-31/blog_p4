<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <script type="text/javascript" src="public/js/tinymce/tinymce.min.js"></script>
    <!--
        <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#title',
            language: "fr_FR",
            toolbar: 'undo redo | fontselect fontsizeselect forecolor | bold italic underline strikethrough | backcolor | alignleft aligncenter alignright alignjustify | outdent indent lineheight',
            height: 100,
            menubar:false,
            statusbar: false,
        });
    -->
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