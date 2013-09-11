<?php

/*
 * Model Galeria V1
 */

/**
 * Modelo para la Galeria
 *
 * @author sistemas01
 */
class videoyoutube_Model extends Model {

    public function searchLast() {
        return $this->db->select('SELECT * FROM `videoyoutube` WHERE `idvideoyoutubegrupo`=1 ORDER BY `id` DESC LIMIT 0,1');
    }
}

?>
