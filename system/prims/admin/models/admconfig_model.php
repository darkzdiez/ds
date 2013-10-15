<?php

/**
 * Description of inventory_model
 *
 * @author darkzdiez
 */
class admConfig_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function clientList() {
        return $this->db->select('SELECT * FROM `client`');
    }
}

?>