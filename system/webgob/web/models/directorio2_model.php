<?php

/*
 * Model Galeria V1
 */

/**
 * Modelo para la Galeria
 *
 * @author sistemas01
 */
class Directorio2_Model extends Model {

    public function searchDirectory() {
        $query = 'SELECT * FROM `directory`';
        if ($result['result'] = $this->db->select($query)) {
            $result['num'] = count($result['result']);
            return $result;
        } else {
            return FALSE;
        }
    }

    public function searchDepartment($id) {
        $query = "SELECT *  FROM `directory_department` WHERE `iddirectory` = '" . $id . "'";
        if ($result['result'] = $this->db->select($query)) {
            $result['num'] = count($result['result']);
            return $result;
        } else {
            return FALSE;
        }
    }

    public function searchOffice($id) {
        $query = "SELECT *  FROM `directory_office` WHERE `iddirectory_department` = '" . $id . "'";
        if ($result['result'] = $this->db->select($query)) {
            $result['num'] = count($result['result']);
            return $result;
        } else {
            return FALSE;
        }
    }

}

?>
