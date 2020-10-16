<?php
include('connexion_bdd.php');

$billetsParPage = 5; // Nombre de billet que l'on veut par page (ici 5)

$retour_total = $bdd->query('SELECT COUNT(*) as NbBillets FROM billets'); // (COUNT)Compte tout le nombre de billet dans la table billets et retour la valeur dans NbBillets
$donnees = $retour_total->fetch();
$totalBillet = $donnees['NbBillets'];

$nombreDePages=ceil($totalBillet/$billetsParPage);
            
if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
{
    $pageActuelle=intval($_GET['page']);
            
    if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
        {
            $pageActuelle=$nombreDePages;
        }
}
else // Sinon
{
    $pageActuelle=1; // La page actuelle est la n°1
}

$premiereEntree=($pageActuelle-1)*$billetsParPage; // On calcul la première entrée à lire

$retour_total->closeCursor();
?>

<?php
    echo 'Page : ';
    for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
    {
    //On va faire notre condition
        if($i==$pageActuelle) //S'il s'agit de la page actuelle...
        {
            echo ' [ '.$i.' ] '; 
        }    
        else //Sinon...
        {
            echo ' <a href="index.php?page='.$i.'">'.$i.'</a> ';
        }
    }
?>

                