<?php


namespace Todo\Models;


class Formateur
{
    private Int $id_formateur;
    private string $nom;
    private string $prenom;
    private Int $id_salle;
    private string $libelleSalle;

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
}