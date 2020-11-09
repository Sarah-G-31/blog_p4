<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include('head.php'); ?>
    </head>
    <body>

        <h1>Mon super blog !</h1>

        <div class="nbpagesup"><?php include('nbpages_billets.php'); ?></div>

        <div class="boutons"><?php include('pseudo_et_boutons.php'); ?></div>

        <div class="billets"><?php include('billets.php'); ?></div>

        <div class="nbpagesdown"><?php include('nbpages_billets.php'); ?></div>

    </body>
</html>

