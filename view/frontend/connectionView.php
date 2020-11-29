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

<form class="connectionForm" action="index.php?action=connection" method="post">
   <p>
        <label class="label" for="pseudo">Pseudo :</label>
        <input class="input" type="text" id="pseudo" name="pseudo" required value="<?php if (isset($input_value["pseudo"])) { echo $input_value["pseudo"][0]; }?>"><br /><br />
        <label class="label" for="password">Mot de passe :</label>
        <input class="input" type="password" id="password" name="password" required ><span id="connection_errors"> <?php if (isset($errors["password"])) { echo $errors["password"][0]; }?></span><br />
        <input class="submitForm" type="submit" name="submit" value="Connexion">
        <span>Pas encore de compte ?</span><br />
        <a href="index.php?action=registration">Inscrivez-vous</a>
    </p>
</form>

<?php
$content = ob_get_clean();
require('template.php');
?>