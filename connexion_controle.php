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
    }
    else
    {
        $erreurs['pseudo'][] = "Pseudo obligatoire";
    }

    // Contrôle du mots de passe
    $mdp = $_POST['mdp'];
    if (empty($mdp))
    {
        $erreurs['mdp'][] = "Le mot de passe est obligatoire"; 
    }
    
    $_SESSION["input_value"] = $input_value;
    $_SESSION["erreurs"] = $erreurs;
    header("location: connexion.php");

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
        
        $controle = $bdd->prepare('SELECT m.id id, m.id_groupe id_groupe, m.pass pass, g.utilisateur utilisateur FROM membres m LEFT JOIN groupes g ON g.id = m.id_groupe WHERE pseudo = :pseudo');
        $controle->execute(array('pseudo' => $pseudo));
        $donnees_controle = $controle->fetch();

        if (!$donnees_controle)
        {
            $erreurs['mdp'][] = "Mauvais identifiant ou mot de passe !";
            $_SESSION["erreurs"] = $erreurs;
            header("location: connexion.php");
        }
        else if (password_verify($mdp, $donnees_controle['pass']))
        {
            session_start();
            $_SESSION['id'] = $donnees_controle['id'];
            $_SESSION['id_groupe'] = $donnees_controle['id_groupe'];
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['utilisateur'] = $donnees_controle['utilisateur'];
            header("location: index.php");
        }
        else
        {
            $erreurs['mdp'][] = "Mauvais identifiant ou mot de passe !";
            $_SESSION["erreurs"] = $erreurs;
            header("location: connexion.php");
        }        
    }
}
?>