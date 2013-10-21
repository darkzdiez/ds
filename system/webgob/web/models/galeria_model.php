<?php

/*
 * Model Galeria V1
 */

/**
 * Modelo para la Galeria
 *
 * @author sistemas01
 */
class galeria_Model extends Model {

    public function singleList() {
        $query = "SELECT * FROM `gallery` ORDER BY `gallery`.`idgallery` DESC";
        if ($result['result'] = $this->db->select($query)) {
            $result['num'] = count($result['result']);
            return $result;
        } else {
            return FALSE;
        }
    }

    public function showPpalImg($idgallery) {
        $query = "SELECT `gallery_has_file`.`type`,`gallery_has_file`.`idgallery`,`file_gallery`.`filename`,`file_location`.`location` FROM gallery_has_file
LEFT JOIN `file_gallery` ON `gallery_has_file`.`idfile` = `file_gallery`.`idfile_gallery` 
LEFT JOIN `file_location` ON `file_gallery`.`file_location_idfile_location` = `file_location`.`idfile_location` WHERE `idgallery`='" . $idgallery . "' AND `type`='ppal'";
        $result = $this->db->select($query);
        return $result;
    }

    public function singleShow($idGaleria) {
        $extract = $idGaleria;
        $query = "SELECT `gallery_has_file`.`type`,`gallery_has_file`.`idgallery`,`file_gallery`.`filename`,`file_location`.`location` FROM gallery_has_file
LEFT JOIN `file_gallery` ON `gallery_has_file`.`idfile` = `file_gallery`.`idfile_gallery` 
LEFT JOIN `file_location` ON `file_gallery`.`file_location_idfile_location` = `file_location`.`idfile_location` WHERE `idgallery`='" . $extract[0] . "' AND `type`='med'";
        if ($result['result'] = $this->db->select($query)) {
            $result['num'] = count($result['result']);
            return $result;
        } else {
            return FALSE;
        }
    }

    public function singleShowMin($idGaleria) {
        $extract = $idGaleria;
        $query = "SELECT `gallery_has_file`.`type`,`gallery_has_file`.`idgallery`,`file_gallery`.`filename`,`file_location`.`location` FROM gallery_has_file
LEFT JOIN `file_gallery` ON `gallery_has_file`.`idfile` = `file_gallery`.`idfile_gallery` 
LEFT JOIN `file_location` ON `file_gallery`.`file_location_idfile_location` = `file_location`.`idfile_location` WHERE `idgallery`='" . $extract[0] . "' AND `type`='min'";
        if ($result['result'] = $this->db->select($query)) {
            $result['num'] = count($result['result']);
            return $result;
        } else {
            return FALSE;
        }
    }
    public function listarVideos($id) {
        return $this->db->select('SELECT * FROM `videoyoutube` WHERE `idvideoyoutubegrupo`=:id ORDER BY `id` DESC',array(':id' => $id));
    }
    public function selectGaleria($id){
        return $this->db->select('SELECT *  FROM `gallery` WHERE `idgallery` = :id', array(':id' => $id));
    }
}

?>
