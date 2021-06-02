<?php
ob_start();
?>
    <section class="create">
        <h1><i class="fas fa-list-alt"></i> Modifier un Stagiaire :</h1>
        <div>
            <div class="list">
                <form action="/stagiaire/modification/" method="POST" name="formulaire">
                <table border=1>
                    <tr>
                        <th>Nom :</th>
                        <th>Prenom :</th>
                        <th>Nationalite :</th>
                        <th>Formation :</th>
                        <th>Supprimer :</th>
                    </tr>
                    <?php
                        // cpt pour donnez des id
                        $cpt = 0;
                        foreach ($tout[0] as $stagiaire) {
                    ?>
                    <tr>
                            <td><input type="text" class="statut<?= $cpt?>" name="<?= $cpt?>[Nom]" placeholder="Nom" value="<?= $stagiaire->getNomStagiaire() ?>"/></td>
                            <td><input type="text" class="statut<?= $cpt?>" name="<?= $cpt?>[Prenom]" placeholder="Prenom" value="<?= $stagiaire->getPrenomStagiaire() ?>"/></td>
                            <td><select class="statut<?= $cpt?>" name="<?= $cpt?>[nationalite]">
                                <?php
                                    // foreach pour les nationalite
                                    foreach ($nationalities as $nationalitie) {
                                ?>
                                <option <?php
                                    // si la nationalite ajouter est celle du stagiaire on ajoute selected pour que ca soit la valeur par defaut
                                    if ($nationalitie->getIdNationalite() == $stagiaire->getIdNationaliteStagiaire()){
                                        echo 'selected="selected"';
                                    }
                                ?> value="<?php echo $nationalitie->getIdNationalite(); ?>"><?php echo $nationalitie->getLibellNAtionalite(); ?></option>;
                                <?php
                                    }
                                ?></td>
                            <td><select class="statut<?= $cpt?>" name="<?= $cpt?>[type_formation]" id="selectFormation" onchange="changementEtat()">
                                <?php
                                    foreach ($type_formations as $type_formation) {
                                ?>
                                    <option <?php
                                        if ($type_formation->getIdFormation() == $stagiaire->getIdTypeFormationStagiaire()){
                                            echo 'selected="selected"';
                                        }
                                    ?>value="<?php echo $type_formation->getIdFormation(); ?>"><?php echo $type_formation->getLibellFormation(); ?></option>;
                                <?php
                                    }
                                ?>
                                </select></td>
                            <td>
                            <?php
                                foreach ($tout[1] as $Reservations) {
                            ?>
                               <input class="statut<?= $cpt?> leschackbox" type="checkbox" name="<?= $cpt?>[Formation[]]"><?= $Reservations->getNom() ?> <?= $Reservations->getPrenom() ?> <?= $Reservations->getLibelleSalle() ?> <input type="date" class="inputDate statut<?= $cpt?>" name="date_debut[]" value="<?= $Reservations->getDateDebut()?>"> <input type="date" class="inputDate statut<?= $cpt?>" name="date_fin[]" value="<?= $Reservations->getDateFin() ?>">
                            <?php
                                }
                            ?>
                            </td>
                        <td><input class="checkboxCheck" onclick="checkeur()" type="checkbox" name="enable[]" class="checkboxEnable"></td>
                    </tr>
                    <?php
                        $cpt++;
                        }
                    ?>
                </table>
                    <button type="submit" name="ok" value="envoyer"> Envoyer </button>
                </form>
            </div>
        </div>
    </section>

<?php
$content = ob_get_clean();

ob_start();
?>
    <script>
        function checkeur() {
            var checkeur = document.getElementsByClassName('checkboxCheck');
            for (var i =0; i < checkeur.length; i++) {
                var enabled = document.getElementsByClassName('statut'+i)
                for (var y = 0; y < enabled.length ; y++){
                    enabled[y].disabled = true
                }
                if (checkeur[i].checked === true) {
                    var disabled = document.getElementsByClassName('statut'+i)
                    for (var z = 0; z < disabled.length ; z++){
                        disabled[z].disabled = false
                    }
                }
            }
        }
        /* -------------------- NE FONCTIONNE PAS -------------------- */
        //Script pour desactiver ou activer les checkbox
        //je recupere toutes les checkbox et les stock dans un tableau
        var tab = document.getElementsByClassName('leschackbox');
        //la function changementEtat
        function changementEtat() {
            // je recupere la valeur du selct
            var value = document.getElementById('selectFormation').value;
            //je boucle et je desactive toutes les checkbox
            for (var i = 0; i < tab.length ; i++) {
                tab[i].disabled = true;
                //je recupere toutes les checkbox qui on la meme valeur du select
                var enable = document.getElementsByClassName(value)
            }
            // je boucle sur le tableau recuperer juste au dessus
            for (var y = 0; y < enable.length ; y++){
                // je reactive toutes les class qui ont la meme valeur du select
                enable[y].disabled = false;
            }
            // la meme chose que au dessus mais pour desactiver les dates
            var tab2 = document.getElementsByClassName('inputDate');
            for (var i = 0; i < tab2.length ; i++) {
                tab2[i].disabled = true;
                var enable = document.getElementsByClassName(value)
            }
            for (var y = 0; y < enable.length ; y++){
                enable[y].disabled = false;
            }
        }
        // et je lance la fontion au lancement de la page
        window.onload = changementEtat()
        window.onload = checkeur();
    </script>

<?php
$javascript = ob_get_clean();
require VIEWS . 'layout.php';
