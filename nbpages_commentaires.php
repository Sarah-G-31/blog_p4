<?php
include('connexion_bdd.php');

$commentairesParPage = 3;

$retour_total = $bdd->prepare('SELECT COUNT(*) as NbCommentaires FROM commentaires WHERE id_billet = ?');
$retour_total->execute(array($_GET['billet']));
$donnees = $retour_total->fetch();
$totalCommentaire = $donnees['NbCommentaires'];

$nombreDePages=ceil($totalCommentaire/$commentairesParPage);

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

$premiereEntree=($pageActuelle-1)*$commentairesParPage; // On calcul la première entrée à lire

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
            $url = $_GET['billet'];
            echo ' <a href="commentaires.php?billet='.$url.'&page='.$i.'">'.$i.'</a> ';
        }
    }
?>