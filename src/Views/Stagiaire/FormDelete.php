<?php
ob_start();
?>
    <section class="create">
        <h1><i class="fas fa-list-alt"></i> Suppression Stagiaire :</h1>
        <div>
            <div class="list">
                <table border=1>
                    <tr>
                        <th>Nom :</th>
                        <th>Prenom :</th>
                        <th>Nationalite :</th>
                        <th>Formation :</th>
                        <th>Supprimer :</th>
                    </tr>
                    <?php
                        foreach ($tout[0] as $stagiaire) {
                    ?>
                    <tr>
                        <form action="/stagiaire/delete/" method="POST" name="formulaire">
                            <td><?= $stagiaire->getNomStagiaire() ?></td>
                            <td><?= $stagiaire->getPrenomStagiaire() ?></td>
                            <td><?= $stagiaire->getLibelleNationaliteStagiaire() ?></td>
                            <td><?= $stagiaire->getLibelleFormationStagiaire() ?></td>
                            <td>
                            <?php
                                foreach ($tout[1] as $Reservations) {
                                    if ($stagiaire->getIdStagiaire() == $Reservations->getIdStagiaires()) {
                            ?>
                                       <p> <?= $Reservations->getNom() ?> <?= $Reservations->getPrenom() ?> <?= $Reservations->getLibelleSalle() ?> <?= $Reservations->getDateDebut() ?> <?= $Reservations->getDateFin() ?></p>
                            <?php
                                    }
                                }
                            ?>
                            </td>
                            <td><input type="checkbox" class="leschackbox" name="Formation[]" value="<?php echo $stagiaire->getIdStagiaire() ?>"></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                <button class="bouttonSubmit" type="submit" name="ok" value="envoyer">Envoyer</button>
                </form>
            </div>
        </div>
    </section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
