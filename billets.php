<?php
include('connexion_bdd.php');

// Récupération de tous les billets dans la bdd
$retour_billets = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM billets ORDER BY id DESC LIMIT '.$premiereEntree.', '.$billetsParPage.'');
?>

<h4>Derniers billets du blog :</h4>

<?php
// On lit et on affiche les entrées une à une grâce à une boucle
while($donnees_billets = $retour_billets->fetch()) 
{
    ?>
    <div class="news">
        <h3><?php echo $donnees_billets['titre']; ?><i> le <?php echo $donnees_billets['date']; ?></i></h3>
        <p class="news p">
            <?php echo nl2br($donnees_billets['contenu']); ?><br />
            <a href="commentaires.php?billet=<?php echo $donnees_billets['id']; ?>"><i>Commentaires</i></a>
        </p><br />
    </div>
    <?php
}
$retour_billets->closeCursor();
?>