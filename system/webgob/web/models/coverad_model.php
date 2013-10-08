<?php //

/* Conjunto de Scripts
 * Copyright (c) 2013 - Alfonzo Diez (+58 416 753 1889 - alfonzodiez@gmail.com)
 * http://www.diezsoluciones.com/
 * Utilizando en la librería coverad_Model
 * Created on : 09/01/2013 03:54:14 PM
 * Author     : darkzdiez
 * Revision   : 01
 * La reproducción, utilización, venta y copia no autorizada de alguno de los scripts en este archivo esta prohibida totalmente.
 * The reproduction, use, sell unauthorized copies of any of the scripts in this file is prohibited entirely.
 */

/*
 * Description:
 *
 */

class coverad_Model extends Model {

    public function singleList($limit = null) {
        if ($limit != null) {
            $_sqlLimit = ' LIMIT ' . $limit;
        } else {
            $_sqlLimit = '';
        }
        return $this->db->select('SELECT `cover_ad`.`id`, `cover_ad`.`toptitle`, `cover_ad`.`title`, `cover_ad`.`description`, `cover_ad`.`dtexto`, `cover_ad`.`idarticle`, `file`.`filename`, `file_location`.`location` FROM `cover_ad`,  `file`,  `file_location` WHERE `cover_ad`.`file_idfile`=`file`.`idfile` AND  `file`.`file_location_idfile_location`=`file_location`.`idfile_location` AND `status`=1 ORDER BY `cover_ad`.`id` DESC' . $_sqlLimit);
    }

}

?>