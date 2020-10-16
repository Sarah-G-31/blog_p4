<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>

        <h1>Mon super blog !</h1>

        <div><?php include('nbpages_billets.php'); ?><input class="admin_login" type="button" onclick="window.location.href='admin/admin.php';" value="Administrateur"></div>

        <div><?php include('billets.php'); ?></div>

        <div><?php include('nbpages_billets.php'); ?></div>

    </body>
</html>

