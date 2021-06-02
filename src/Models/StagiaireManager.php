<?php


namespace Todo\Models;

use Todo\Models\Stagiaire;
use Todo\Models\Nationalite;
use Todo\Models\Typeformation;
class StagiaireManager
{
    private $bdd;
    // fonction pour se connecter a la bdd
    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    // fonction pour recuperer toutes les nationalites
    public function getAllNationalities()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM nationalite');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Todo\Models\Nationalite");
    }
    // fonction pour recuperer toutes les formations
    public function getAllFormations()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM type_formation');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Todo\Models\Type_formation");
    }
    // fonction pour stocker les stagiaires et la/les formations reserver
    public function store() {
        $cpt = 0 ;
        $idStagiaire = uniqid();
        $stmt = $this->bdd->prepare("INSERT INTO stagiaire(id_stagiaire, nom, prenom, id_nationalite, id_type_formation) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array(
        htmlspecialchars($idStagiaire),
        htmlspecialchars($_POST["Nom"]),
        htmlspecialchars($_POST["Prenom"]),
        htmlspecialchars($_POST["nationalite"]),
        htmlspecialchars($_POST["type_formation"]),
        ));
        while (count($_POST['Formation']) > $cpt) {
            $stmt = $this->bdd->prepare("INSERT INTO stagiaire_formateur(id_stagiaire, id_formateur, date_debut, date_fin) VALUES (?, ?, ?, ?)");

            $stmt->execute(array(
                $idStagiaire,
                htmlspecialchars($_POST["Formation"][$cpt]),
                htmlspecialchars($_POST["date_debut"][$cpt]),
                htmlspecialchars($_POST["date_fin"][$cpt]),
            ));

            $cpt++;
        }


    }
    // fonction pour recuperer tout les stagiaires et les reservations qu'ils ont reserver
    public function getAllStagiaires() {
        $stmt = $this->bdd->prepare("SELECT stagiaire.id_stagiaire , stagiaire.nom AS nomStagiaire, stagiaire.prenom AS prenomStagiaire , stagiaire.id_nationalite , stagiaire.id_type_formation , nationalite.libelle AS libelleNationalite , type_formation.libelle AS libelleFormation , id_formateur FROM stagiaire INNER JOIN nationalite ON stagiaire.id_nationalite = nationalite.id_nationalite INNER JOIN type_formation ON stagiaire.id_type_formation = type_formation.id_type_formation INNER JOIN stagiaire_formateur ON stagiaire.id_stagiaire = stagiaire_formateur.id_stagiaire");
        $stmt->execute();
        $stagiaires = $stmt->fetchAll(\PDO::FETCH_CLASS,"Todo\Models\Stagiaire");

        $reservations = [];
        $stmt = $this->bdd->prepare("SELECT id_stagiaire , stagiaire_formateur.id_formateur , date_debut , date_fin , nom , prenom , libelle AS libelleSalle FROM stagiaire_formateur INNER JOIN formateur ON formateur.id_formateur = stagiaire_formateur.id_formateur INNER JOIN salle ON salle.id_salle = formateur.id_salle");
        $stmt->execute();
        $reservations = $stmt->fetchAll(\PDO::FETCH_CLASS,"Todo\Models\Reservations");

        $tout = [];
        array_push($tout , $stagiaires);
        array_push($tout , $reservations);
        return $tout;
    }
    // fonction pour recuperer tous les formateurs et leur salle
    public function getAllFormateurs() {
        $stmt = $this->bdd->prepare("SELECT formateur.id_formateur, nom, prenom, salle.id_salle, libelle AS libelleSalle FROM formateur INNER JOIN salle ON salle.id_salle = formateur.id_salle");
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Todo\Models\Formateur");
    }
    // fonction pour recuperer tous les formateurs et leur salle et leur type de formation fait
    public function getAllFormateursFormation() {
        $stmt = $this->bdd->prepare("SELECT formateur.id_formateur, nom, prenom, salle.id_salle, libelle AS libelleSalle , id_type_formation FROM formateur INNER JOIN salle ON salle.id_salle = formateur.id_salle INNER JOIN type_format_formateur ON formateur.id_formateur = type_format_formateur.id_formateur");
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Todo\Models\FormateurType");
    }

    // fonction pour supprimer un stagiaire et les reservations qu'il a fait
    public function delete() {
        for ($i = 0; $i < count($_POST['Formation']); $i++){
            $stmt = $this->bdd->prepare("DELETE FROM stagiaire_formateur WHERE id_stagiaire = ?");
            $stmt->execute(array(
                $_POST['Formation'][$i],
            ));

            $stmt = $this->bdd->prepare("DELETE FROM stagiaire WHERE id_stagiaire = ?");
            $stmt->execute(array(
                $_POST['Formation'][$i],
            ));
        }

    }
    // fonction pour modifier un stagiaire !!! --- en cours de costruction --- !!!
    public function update($slug,$list_id) {
        $stmt = $this->bdd->prepare("UPDATE task SET nom = ? WHERE nom = ? AND list_id = ?");
        $stmt->execute(array(
            $_POST['nameTask'],
            $slug,
            $list_id
        ));
    }
}