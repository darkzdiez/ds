<?php

/*
 * Model Galeria V1
 */

/**
 * Modelo para la Galeria
 *
 * @author sistemas01
 */
class directorio_Model extends Model {

    public static function searchDirectory() {
        $limit = ' LIMIT ' . implode(',', paginationClass::extract(10));
        $query = 'SELECT * FROM `directory`';
        if ($result['result'] = database::queryold($query . $limit, self::link())) {
            $result['num'] = mysql_num_rows(database::queryold($query, self::link()));
            return $result;
        } else {
            return FALSE;
        }
    }

    public static function searchDepartment($id) {
        $query = "SELECT *  FROM `directory_department` WHERE `iddirectory` = '" . $id . "'";
        if ($result['result'] = database::queryold($query, self::link())) {
            $result['num'] = mysql_num_rows(database::queryold($query, self::link()));
            return $result;
        } else {
            return FALSE;
        }
    }

    public static function searchOffice($id) {
        $query = "SELECT *  FROM `directory_office` WHERE `iddirectory_department` = '" . $id . "'";
        if ($result['result'] = database::queryold($query, self::link())) {
            $result['num'] = mysql_num_rows(database::queryold($query, self::link()));
            return $result;
        } else {
            return FALSE;
        }
    }

}

?>
