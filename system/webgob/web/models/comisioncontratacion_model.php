<?php

/*
 * Model Galeria V1
 */

/**
 * Modelo para la Galeria
 *
 * @author sistemas01
 */
class comisioncontratacion_Model extends Model {

    public function singleList() {
        $limit = ' LIMIT ' . implode(',', Pagination::extract(10));
        $query = 'SELECT * FROM `ccontrataciones` WHERE `status`=0 ORDER BY `ccontrataciones`.`id` DESC';
        if ($result['result'] = $this->db->select($query . $limit)) {
            $result['num'] = count($this->db->select($query));
            return $result;
        } else {
            return FALSE;
        }
    }

    public function singleSearch($id) {
        $query = "SELECT * FROM `ccontrataciones` WHERE `id`='" . $id . "' ORDER BY `ccontrataciones`.`id` DESC";
        if ($result['result'] = database::queryold($query, self::link())) {
            $result['num'] = count(database::queryold($query, self::link()));
            return $result;
        } else {
            return FALSE;
        }
    }

    public function searchLast() {
        return $this->db->select('SELECT * FROM `ccontrataciones` ORDER BY `id` DESC LIMIT 0,1');
    }
}

?>
