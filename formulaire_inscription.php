<?php
session_start();
if (isset($_SESSION["erreurs"])) {
$erreurs = $_SESSION["erreurs"];
}
if (isset($_SESSION["input_value"])) {
$input_value = $_SESSION["input_value"];
}
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Formulaire d'inscription</title>
    </head>
    <body>

        <h1>Inscription</h1>

        <form class="form_inscription" onSubmit="return controle(this)" action="formulaire_controle.php" method="post">
           <p class="p_inscription">
                <label class="titre" type="titre">Formulaire d'inscription</label>
                <label class="label" for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" required pattern="[-_ A-Za-z0-9]{3,12}" minlength="3" maxlength="12" placeholder="De 3 à 12 caractères" value="<?php if (isset($input_value["pseudo"])) { echo $input_value["pseudo"][0]; }?>"><span id="aidePseudo"> <?php if (isset($erreurs["pseudo"])) { echo $erreurs["pseudo"][0]; }?></span><br />
                <label class="label" for="mdp1">Mot de passe :</label>
                <input type="password" id="mdp1" name="mdp1" required minlength="6" placeholder="Au moins 6 caractères"><span id="infoMdp1"> <?php if (isset($erreurs["mdp1"])) { echo $erreurs["mdp1"][0]; }?></span><br />
                <label class="label" for="mdp2">Confirmez le mot de passe :</label></span>
                <input type="password" id="mdp2" name="mdp2" required minlength="6" ><span id="infoMdp2"></span><br />
                <label class="label" for="email">Adresse email :</label>
                <input class="email" type="email" id="email" name="email" required pattern="^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$" value="<?php if (isset($input_value["email"])) { echo $input_value["email"][0]; }?>"><span id="aideEmail"> <?php if (isset($erreurs["email"])) { echo $erreurs["email"][0]; }?></span><br />
                <input class="submit_form" type="submit" name="submit" onclick="controle()" value="Valider">
            </p>
        </form>

        <script src="js/controle_formulaire.js"></script>
    </body>
</html>