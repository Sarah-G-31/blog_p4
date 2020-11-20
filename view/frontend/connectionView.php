<?php
if (isset($_SESSION["erreurs"])) {
$erreurs = $_SESSION["erreurs"];
}
if (isset($_SESSION["input_value"])) {
$input_value = $_SESSION["input_value"];
}

$title = 'Connexion';

ob_start(); ?>

<h1>Connexion</h1>

<form class="form_connexion" action="index.php?action=connection" method="post">
   <p class="p_connexion">
        <label class="label" for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" required value="<?php if (isset($input_value["pseudo"])) { echo $input_value["pseudo"][0]; }?>"><span id="aidePseudo"> <?php if (isset($erreurs["pseudo"])) { echo $erreurs["pseudo"][0]; }?></span>
        <label class="label" for="mdp1">Mot de passe :</label>
        <input type="password" id="mdp" name="mdp" required ><span id="infoMdp"> <?php if (isset($erreurs["mdp"])) { echo $erreurs["mdp"][0]; }?></span><br /><br />
        <input class="submit_form" type="submit" name="submit" value="Connexion">
        <span>Pas encore de compte ?</span><br />
        <a href="formulaire_inscription.php">Inscrivez-vous</a>
    </p>
</form>

<?php
$content = ob_get_clean();

require('template.php');
?>