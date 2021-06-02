<?php


namespace Todo\Models;


class FormateurType
{
    private Int $id_formateur;
    private string $nom;
    private string $prenom;
    private Int $id_salle;
    private string $libelleSalle;
    private int $id_type_formation;

    public function getIdFormateur() :int {
        return $this->id_formateur;
    }

    public function getNom() :string {
        return $this->nom;
    }

    public function getPrenom() :string{
        return $this->prenom;
    }

    public function getIdSalle() :int {
        return $this->id_salle;
    }

    public function getLibelleSalle() :String {
        return $this->libelleSalle;
    }

    public function getIdTypeFormation() :int {
        return $this->id_type_formation;
    }

    public function setIdFormateur(int $id) {
        $this->id_salle = $id;
    }

    public function setNom(string $nom) {
        $this->id_salle = $nom;
    }

    public function setPrenom(string $prenom) {
        $this->id_salle = $prenom;
    }

    public function setIdSalle(int $id) {
        $this->id_salle = $id;
    }

    public function setLibelleSalle(string $libelleSalle) {
        $this->libelleSalle = $libelleSalle;
    }

    public function setIdTypeFormation(int $id) {
        $this->id_type_formation = $id;
    }
}