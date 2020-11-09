<?php
if (isset($_SESSION['id_groupe']) AND $_SESSION['id_groupe'] == 2 OR $_SESSION['id_groupe'] == 3)
{
    include('../connexion_bdd.php');

    $retour_commentaires = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM commentaires WHERE signalement >= 5 ORDER BY signalement');
    $retour_commentaires->execute();
    ?>

    <div class="titre">Commentaires</div>

    <?php
    while($donnees_messages = $retour_commentaires->fetch())
    {
    ?>
        <div class="texte">
            <p><strong><?php echo $donnees_messages['auteur']; ?></strong> le <?php echo $donnees_messages['date']; ?></p>
            <p>
                <?php echo nl2br($donnees_messages['commentaire']); ?>
                <input id="delete" type="button" onclick="window.location.href='delete_commentaire.php?commentaire=<?php echo $donnees_messages['id']; ?>';" value="Supprimer">
                <input id="annuler" type="button" onclick="window.location.href='annuler_signalement_commentaire.php?commentaire=<?php echo $donnees_messages['id']; ?>';" value="Annuler">
            </p>
        </div>
    <?php
    }
    $retour_commentaires->closeCursor();
}
?>