<?php

class banner_Model extends Model {
    
    public function listar() {
        return $this->db->select('SELECT * FROM `banner` ORDER BY `banner`.`idbanner`  DESC');
    }

}