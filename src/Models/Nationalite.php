<?php


namespace Todo\Models;


class Nationalite
{
    private Int $id_nationalite;
    private string $libelle;

    public function getIdNationalite() :int {
        return $this->id_nationalite;
    }

    public function getLibellNAtionalite() :String {
        return $this->libelle;
    }

    public function setIdNationalite(Int $id) {
        $this->id_nationalite = $id;
    }

    public function SetLibelleNationalite(String $libelle) {
        $this->libelle = $libelle;
    }
}