<?php

/*
 * Model Galeria V1
 */

/**
 * Modelo para la Galeria
 *
 * @author sistemas01
 */
class GaleriaModel extends Model {

    public static function singleList() {
        $query = "SELECT * FROM `gallery` ORDER BY `gallery`.`idgallery` DESC";
        if ($result['result'] = database::queryold($query, self::link())) {
            $result['num'] = mysql_num_rows($result['result']);
            return $result;
        } else {
            return FALSE;
        }
    }

    public static function showPpalImg($idgallery) {
        $query = "SELECT `gallery_has_file`.`type`,`gallery_has_file`.`idgallery`,`file_gallery`.`filename`,`file_location`.`location` FROM gallery_has_file
LEFT JOIN `sitioweb`.`file_gallery` ON `gallery_has_file`.`idfile` = `file_gallery`.`idfile_gallery` 
LEFT JOIN `sitioweb`.`file_location` ON `file_gallery`.`file_location_idfile_location` = `file_location`.`idfile_location` WHERE `idgallery`='" . $idgallery . "' AND `type`='ppal'";
        $results = database::queryold($query, self::link());
        $result = mysql_fetch_array($results, MYSQL_ASSOC);
        return $result;
    }

    public static function singleShow() {
        $extract = explode('-', URLVariablesClass::get('seephoto'));
        $query = "SELECT `gallery_has_file`.`type`,`gallery_has_file`.`idgallery`,`file_gallery`.`filename`,`file_location`.`location` FROM gallery_has_file
LEFT JOIN `sitioweb`.`file_gallery` ON `gallery_has_file`.`idfile` = `file_gallery`.`idfile_gallery` 
LEFT JOIN `sitioweb`.`file_location` ON `file_gallery`.`file_location_idfile_location` = `file_location`.`idfile_location` WHERE `idgallery`='" . $extract[0] . "' AND `type`='med'";
        if ($result['result'] = database::queryold($query, self::link())) {
            $result['num'] = mysql_num_rows($result['result']);
            return $result;
        } else {
            return FALSE;
        }
    }

    public static function singleShowMin() {
        $extract = explode('-', URLVariablesClass::get('seephoto'));
        $query = "SELECT `gallery_has_file`.`type`,`gallery_has_file`.`idgallery`,`file_gallery`.`filename`,`file_location`.`location` FROM gallery_has_file
LEFT JOIN `sitioweb`.`file_gallery` ON `gallery_has_file`.`idfile` = `file_gallery`.`idfile_gallery` 
LEFT JOIN `sitioweb`.`file_location` ON `file_gallery`.`file_location_idfile_location` = `file_location`.`idfile_location` WHERE `idgallery`='" . $extract[0] . "' AND `type`='min'";
        if ($result['result'] = database::queryold($query, self::link())) {
            $result['num'] = mysql_num_rows($result['result']);
            return $result;
        } else {
            return FALSE;
        }
    }

}

?>
