<?php


namespace Todo\Models;


class Reservations
{
    private String $id_stagiaire;
    private int $id_formateur;
    private String $date_debut;
    private String $date_fin;
    private String $nom;
    private String $prenom;
    private String $libelleSalle;

    public function getIdStagiaires() :String {
        return $this->id_stagiaire;
    }

    public function getIdFormateur() :int {
        return $this->id_formateur;
    }

    public function getDateDebut() :String {
        return $this->date_debut;
    }

    public function getDateFin() :String {
        return $this->date_fin;
    }

    public function getNom() :String {
        return $this->nom;
    }

    public function getPrenom() :String {
        return $this->prenom;
    }

    public function getLibelleSalle() :String {
        return $this->libelleSalle;
    }

    public function setIdStagiaire(string $id) {
       $this->id_stagiaire = $id;
    }

    public function setIdFormateur(int $id) {
        $this->id_formateur = $id;
    }

    public function setDateDebut(string $date) {
        $this->date_debut = $date;
    }

    public function setDateFin(string $date) {
        $this->date_fin = $date;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom) {
        $this->prenom = $prenom;
    }

    public function setLibelleSalle(string $libelle) {
        $this->libelleSalle = $libelle;
    }
}