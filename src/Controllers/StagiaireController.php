<?php


namespace Todo\Controllers;


use Todo\Validator;
use Todo\Models\StagiaireManager;

class StagiaireController
{
    private $manager;
    private $validator;

    // fonction construct qui creer le manager des stagiaires et le validator
    public function __construct() {
        $this->manager = new StagiaireManager();
        $this->validator = new Validator();
    }

    public function index() {
        require VIEWS . 'Stagiaire/homepage.php';
    }

    //fonction pour recuperer :
    public function create() {
        // les nationalites du stagiaire qu'ils peux avoir
        $nationalities = $this->manager->getAllNationalities();
        //  les formations disponible
        $type_formations = $this->manager->getAllFormations();
        // les formateurs sans leur types de formations qu'ils font
        $formateurs = $this->manager->getAllFormateurs();
        // les formateurs mais avec les types de formations qu'ils font
        $formateursFormation = $this->manager->getAllFormateursFormation();
        require VIEWS . 'Stagiaire/addStagiaire.php';
    }
    // la fonction pour stocker le stagiaires
    public function store() {
        $this->validator->validate([

        ]);
        if (!$this->validator->errors()) {
            $this->manager->store();
            header("Location: /stagiaire/ShowAll");
        } else {
            header("Location: /stagiaire/ShowAll");
        }
    }
    // la fonction pour recuperer tout les stagiaires
    public function ShowAll() {
        $tout = $this->manager->getAllStagiaires();
        require VIEWS . 'Stagiaire/ShowAllStagiaire.php';
    }
    // fonction pour supprimer un stagiaires et toutes les formations qu'ils a reserver
    public function delete() {
        $this->validator->validate([

        ]);
        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors()) {
            $this->manager->delete();
            header("Location: /stagiaire/ShowAll");
        } else {
            header("Location: /");
        }
    }
    // fonction pour recuperer tous les stagiaires et afficher la page de suppression du stagiaire
    public function formDelete() {
        $tout = $this->manager->getAllStagiaires();
        require VIEWS . 'Stagiaire/FormDelete.php';
    }
    // la fonction pour recuperer tout les stagiaires
    public function formStagiaire() {
        // les nationalites du stagiaire qu'ils peux avoir
        $nationalities = $this->manager->getAllNationalities();
        //  les formations disponible
        $type_formations = $this->manager->getAllFormations();
        // les formateurs sans leur types de formations qu'ils font
        $formateurs = $this->manager->getAllFormateurs();
        // les formateurs mais avec les types de formations qu'ils font
        $formateursFormation = $this->manager->getAllFormateursFormation();
        $tout = $this->manager->getAllStagiaires();
        require VIEWS . 'Stagiaire/modifStagiaire.php';
    }
    // fonction poyur modifier un stagiaire !!! --- en cours de construction --- !!!
    public function update() {
        $this->validator->validate([

        ]);
        var_dump($_POST);
        if (!$this->validator->errors()) {

        } else {
            header("Location: /dashboard/" . $slug);
        }
    }
}