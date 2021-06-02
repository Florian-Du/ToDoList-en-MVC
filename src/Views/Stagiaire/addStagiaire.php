<?php
ob_start();
?>
    <section class="create">
        <h1><i class="fas fa-list-alt"></i> Création Stagiaire :</h1>
        <div>
            <div class="list">
                <form action="/stagiaire/store" method="POST" name="formulaire">
                    <input type="text" name="Nom" placeholder="Nom"/>
                    <input type="text" name="Prenom" placeholder="Prenom"/>
                    <p>Nationalite : <select name="nationalite">
                    <?php
                        foreach ($nationalities as $nationalitie) {

                    ?>
                        <option value="<?php echo $nationalitie->getIdNationalite(); ?>"><?php echo $nationalitie->getLibellNAtionalite(); ?></option>;
                    <?php
                        }
                    ?>
                    </select></p>
                    <p>Type de la formation : <select name="type_formation" id="selectFormation" onchange="changementEtat()">
                            <?php
                                foreach ($type_formations as $type_formation) {
                            ?>
                                <option value="<?php echo $type_formation->getIdFormation(); ?>"><?php echo $type_formation->getLibellFormation(); ?></option>;
                            <?php
                                }
                            ?>
                    </select></p>
                    <?php
                        foreach ($formateurs as $formateur) {
                    ?>
                        <input type="checkbox" class="leschackbox<?php
                            foreach ($formateursFormation as $formateurFormation) {
                                if ($formateur->getIdFormateur() == $formateurFormation->getIdFormateur()) {
                                    echo " ".$formateurFormation->getIdTypeFormation();
                                }
                            }
                        ?>" name="Formation[]" value="<?php echo $formateur->getIdFormateur(); ?>">
                        <label for="vehicle1" ><?php echo $formateur->getNom(); ?> <?php echo $formateur->getPrenom(); ?> en salle <?php echo $formateur->getLibelleSalle(); ?> :</br> date de debut :<input class="inputDate <?php
                            foreach ($formateursFormation as $formateurFormation) {
                                if ($formateur->getIdFormateur() == $formateurFormation->getIdFormateur()) {
                                    echo " ".$formateurFormation->getIdTypeFormation();
                                }
                            }
                            ?>" type="date" name="date_debut[]" value="'.date("Y-m-d").'" /> Date de fin : <input class="inputDate <?php
                            foreach ($formateursFormation as $formateurFormation) {
                                if ($formateur->getIdFormateur() == $formateurFormation->getIdFormateur()) {
                                    echo " ".$formateurFormation->getIdTypeFormation();
                                }
                            }
                            ?>" type="date" name="date_fin[]" value="'.date("Y-m-d").'" /></label><br>
                        <?php
                            }
                        ?>
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
</script>
<?php
$javascript = ob_get_clean();
require VIEWS . 'layout.php';


