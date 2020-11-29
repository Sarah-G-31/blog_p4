<?php
if (isset($_SESSION["errors"])) {
$errors = $_SESSION["errors"];
}
if (isset($_SESSION["input_value"])) {
$input_value = $_SESSION["input_value"];
}

$title = 'Formulaire d\'inscription';
ob_start();
?>

<h1>Inscription</h1>

<form class="registrationForm" action="index.php?action=registration" method="post">
    <p>
        <label class="title" type="title">Formulaire d'inscription</label>
        <label class="label" for="pseudo">Pseudo :</label>
        <input class="input" type="text" id="pseudo" name="pseudo" required pattern="[-_ A-Za-z0-9]{3,12}" minlength="3" maxlength="12" placeholder="De 3 à 12 caractères" value="<?php if (isset($input_value["pseudo"])) { echo $input_value["pseudo"][0]; }?>"><span id="pseudo_help"> <?php if (isset($errors["pseudo"])) { echo $errors["pseudo"][0]; }?></span><br />
        <label class="label" for="password1">Mot de passe :</label>
        <input class="input" type="password" id="password1" name="password1" required minlength="6" placeholder="Au moins 6 caractères"><span id="password1_error"> <?php if (isset($errors["password1"])) { echo $errors["password1"][0]; }?></span><br />
        <label class="label" for="password2">Confirmez le mot de passe :</label></span>
        <input class="input" type="password" id="password2" name="password2" required minlength="6" ><span id="password2_error"></span><br />
        <label class="label" for="email">Adresse email :</label>
        <input class="input" type="email" id="email" name="email" required pattern="^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$" value="<?php if (isset($input_value["email"])) { echo $input_value["email"][0]; }?>"><span id="email_help"> <?php if (isset($errors["email"])) { echo $errors["email"][0]; }?></span><br />
        <input class="submitForm" type="submit" name="submit" value="Valider">
    </p>
</form>

<?php
$content = ob_get_clean();
require('template.php');
?>