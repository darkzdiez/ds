<?php

/*
 * Model video V1
 */

/**
 * Modelo para video
 *
 * @author sistemas01
 */
class video_Model extends Model {

    public static function singleList() {
        $limit = ' LIMIT ' . implode(',', paginationClass::extract(10));
        $query = 'SELECT * FROM `ccontrataciones` ORDER BY `ccontrataciones`.`id` DESC';
        if ($result['result'] = database::queryold($query . $limit, self::link())) {
            $result['num'] = mysql_num_rows(database::queryold($query, self::link()));
            return $result;
        } else {
            return FALSE;
        }
    }

    public static function singleSearch($id) {
        $query = "SELECT * FROM `ccontrataciones` WHERE `id`='" . $id . "' ORDER BY `ccontrataciones`.`id` DESC";
        if ($result['result'] = database::queryold($query, self::link())) {
            $result['num'] = mysql_num_rows(database::queryold($query, self::link()));
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
