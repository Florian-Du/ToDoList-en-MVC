<?php


namespace Todo\Models;


class Stagiaire
{
    private String $id_stagiaire;
    private string $nomStagiaire;
    private string $prenomStagiaire;
    private Int $id_nationalite;
    private Int $id_type_formation;
    private string $libelleNationalite;
    private string $libelleFormation;
    private string $nomFormateur;
    private string $prenomFormateur;
    private Int $id_formateur;

    public function getIdStagiaire() :String {
        return $this->id_stagiaire;
    }

    public function getNomStagiaire() :String {
        return $this->nomStagiaire;
    }

    public function getPrenomStagiaire() :String {
        return $this->prenomStagiaire;
    }

    public function getIdNationaliteStagiaire() :int {
        return $this->id_nationalite;
    }

    public function getIdTypeFormationStagiaire() :int {
        return $this->id_type_formation;
    }

    public function getLibelleNationaliteStagiaire() :string {
        return $this->libelleNationalite;
    }

    public function getLibelleFormationStagiaire() :string {
        return $this->libelleFormation;
    }

    public function getNomFormateur() :String {
        return $this->nomFormateur;
    }

    public function getPrenomFormateur() :String {
        return $this->prenomFormateur;
    }

    public function getIdFormateur() :int {
        return $this->id_formateur;
    }

    public function setIdStagiaire(String $id) {
        $this->id_stagiaire = $id;
    }

    public function setNomStagiaire(String $nom) {
        $this->nomStagiaire = $nom;
    }

    public function setPrenomStagiaire(String $prenom) {
        $this->prenomStagiaire = $prenom;
    }

    public function setIdNationaliteStagiaire(Int $id) {
        $this->id_nationalite = $id;
    }

    public function setIdTypeFormationStagiaire(Int $id) {
        $this->id_type_formation = $id;
    }

    public function setLibelleNationaliteStagiaire(string $id) {
        $this->libelleNationalite = $id;
    }

    public function setLibelleFormationStagiaire(string $id) {
        $this->libelleFormation = $id;
    }

    public function setNomFormateur(String $nom) {
        $this->nomFormateur = $nom;
    }

    public function setPrenomFormateur(String $prenom) {
        $this->prenomFormateur = $prenom;
    }

    public function setIdFormateur(int $id) {
        $this->id_formateur = $id;
    }
}