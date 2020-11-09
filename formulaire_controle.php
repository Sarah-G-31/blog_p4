<?php
session_start();
$erreurs = array();
$input_value = array();

if (isset($_POST['submit']))
{
    // Contrôle du pseudo
    if (!empty($_POST['pseudo']))
    {
        $pseudo = strip_tags($_POST['pseudo']);
        $input_value['pseudo'][] = $pseudo;
        if (strlen($pseudo) < 3 ) { $erreurs['pseudo'][] = "Pseudo trop court"; }
        if (strlen($pseudo) > 12 ) { $erreurs['pseudo'][] = "Pseudo trop long"; }
        if (preg_match("#[^-_ A-Za-z0-9]#", $pseudo)) { $erreurs['pseudo'][] = "Caractère interdit"; }
    } else { $erreurs['pseudo'][] = "Pseudo obligatoire"; }

    // Contrôle des mots de passe
    $mdp1 = $_POST['mdp1'];
    $mdp2 = $_POST['mdp2'];
    if (empty($mdp1)) { $erreurs['mdp1'][] = "Le mot de passe est obligatoire"; }
    if (strlen($mdp1) < 6) { $erreurs['mdp1'][] = "Mot de passe trop court"; }
    if (strlen($mdp2) == 0) { $erreurs['mdp1'][] = "Le mot de passe doit etre saisi 2 fois"; }
    if ((!preg_match("#[0-9]+#", $mdp1)) || (!preg_match("#[0-9]+#", $mdp2))) { $erreurs['mdp1'][] = "Le mot de passe ne contient aucun chiffre"; }
    if ($mdp1 != $mdp2) { $erreurs['mdp1'][] = "Les mots de passe saisis sont différents";
    } else { $hashed_password = password_hash($_POST['mdp1'], PASSWORD_DEFAULT); }
    
    // Contrôle de l'email
    if (!empty($_POST['email']))
    {
        $email = htmlspecialchars($_POST['email']);
        $input_value['email'][] = $email;
        if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
            $erreurs['email'][] = "Adresse email invalide";
    } else { $erreurs['email'][] = "Adresse email obligatoire"; }


    $_SESSION["input_value"] = $input_value;
    $_SESSION["erreurs"] = $erreurs;
    header("location: formulaire_inscription.php");

    if (count($erreurs) == 0)
    {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        

        $controle_pseudo = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = :pseudo');
        $controle_pseudo->execute(array('pseudo' => $pseudo));
        $donnees_controle_pseudo = $controle_pseudo->fetch();

        if (count($donnees_controle_pseudo['pseudo']) > 0 )
        {
            $erreurs['pseudo'][] = "Ce pseudo existe déjà";
            $_SESSION["erreurs"] = $erreurs;
            $controle_pseudo->closeCursor();
            header("location: formulaire_inscription.php");
        }
      
        $controle_email = $bdd->prepare('SELECT email FROM membres WHERE email = :email');
        $controle_email->execute(array('email' => $email));
        $donnees_controle_email = $controle_email->fetch();

        if (count($donnees_controle_email['email']) > 0 )
        {
            $erreurs['email'][] = "Cet email est déjà enregistré";
            $_SESSION["erreurs"] = $erreurs;
            $controle_email->closeCursor();
            header("location: formulaire_inscription.php");
        }
        
        if (count($erreurs) == 0)
        {
            $req = $bdd->prepare('INSERT INTO membres(id_groupe, pseudo, pass, email) VALUES(:id_groupe, :pseudo, :pass, :email)');
            $req->execute(array(
                'id_groupe' => "1",
                'pseudo' => $pseudo,        
                'pass' => $hashed_password,
                'email' => $email
                ));
            
            $req->closeCursor();
            session_destroy();
            header("Location: connexion.php");
            exit();
        }
    }
}
?>