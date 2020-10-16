<?php
include('connexion_bdd.php');

// Récupération de tous les billets
$retour_billets = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM billets ORDER BY id DESC LIMIT '.$premiereEntree.', '.$billetsParPage.'');
?>

<h4>Derniers billets du blog :</h4>

<?php
// Affichage de tous les billets
while($donnees_billets = $retour_billets->fetch()) // On lit les entrées une à une grâce à une boucle
{
    ?>
    <div class="news">
        <h3><?php echo $donnees_billets['titre']; ?><i> le <?php echo $donnees_billets['date']; ?></i></h3>
        <p class="news p">
            <?php echo nl2br($donnees_billets['contenu']); ?><br />
            <a href="commentaires.php?billet=<?php echo $donnees_billets['id']; ?>"><i>Commentaires</i></a> <!-- Affiche le mot "commentaires" dans billet et fait le lien avec le fichier commentaires.php -->
        </p><br />
    </div>
    <?php
}

// Fin de la boucle des billets
$retour_billets->closeCursor();
?>