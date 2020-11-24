<?php
if (isset($_SESSION["errors"])) {
$errors = $_SESSION["errors"];
}
if (isset($_SESSION["input_value"])) {
$input_value = $_SESSION["input_value"];
}

$title = 'Connexion';
ob_start(); ?>

<h1>Connexion</h1>

<form class="connection_form" action="index.php?action=connection" method="post">
   <p class="connection_p">
        <label class="label" for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" required value="<?php if (isset($input_value["pseudo"])) { echo $input_value["pseudo"][0]; }?>"><span id="pseudo_help"> <?php if (isset($errors["pseudo"])) { echo $errors["pseudo"][0]; }?></span>
        <label class="label" for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required ><span id="connection_errors"> <?php if (isset($errors["password"])) { echo $errors["password"][0]; }?></span><br /><br />
        <input class="submit_form" type="submit" name="submit" value="Connexion">
        <span>Pas encore de compte ?</span><br />
        <a href="index.php?action=registration">Inscrivez-vous</a>
    </p>
</form>

<?php
$content = ob_get_clean();
require('template.php');
?>