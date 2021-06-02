<?php
ob_start();
?>

<section class="homepage">
    <h1>Stagiaire</h1>
    <p>Stagiaire Evalutation MVC </p>
    <p>L'ajout fonctionne</p>
    <p>La suppression fonctionne</p>
    <p>Et il y a un debut de modification mais juste l'affichage </p>
    <p>Mais c'est les checkbox qui m'ont poser problemes a la desactiver quand il le faut ou non ducoup sa envoyais les dates de tout le dormulaire dans la modification</p>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
