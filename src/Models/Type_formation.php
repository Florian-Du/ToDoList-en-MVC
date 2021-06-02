<?php


namespace Todo\Models;


class Type_formation
{
    private Int $id_type_formation;
    private string $libelle;

    public function getIdFormation() :int {
        return $this->id_type_formation;
    }

    public function getLibellFormation() :String {
        return $this->libelle;
    }

    public function setIdFormation(Int $id) {
        $this->id_type_formation = $id;
    }

    public function SetLibelleFormation(String $libelle) {
        $this->libelle = $libelle;
    }
}