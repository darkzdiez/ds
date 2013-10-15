<?php

class inventarioinformatica_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function dependenciaList($idparent = 0) {
        return $this->db->select('SELECT *  FROM `bien_dependencia` WHERE `idparent` = :idparent', array(':idparent' => $idparent));
    }

}