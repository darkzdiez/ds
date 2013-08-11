<?php

class image_Model extends Model {

    public function singleSearch($idNews) {
        return $this->db->select('SELECT `article_has_file`.`article_idarticle`,`file`.`idfile`,`file`.`filename`,`file`.`description`,`file_location`.`location`,`file_type`.`extencion`,`file_type`.`mime_type`,`file`.`mark`, `article`.`main_idfile` FROM file
            LEFT JOIN `file_location` ON `file`.`file_location_idfile_location` = `file_location`.`idfile_location` 
            LEFT JOIN `file_type` ON `file`.`file_type_idfile_type` = `file_type`.`idfile_type` 
            LEFT JOIN `article_has_file` ON `file`.`idfile` = `article_has_file`.`file_idfile`
            LEFT JOIN `article` ON `article_has_file`.`article_idarticle` = `article`.`idarticle`
            WHERE `article_has_file`.`article_idarticle`=:idNews', array(':idNews' => $idNews));
    }

    public function saveImage($name, $idNews) {
        $data['filename'] = $name;
        $data['description'] = $name;
        $data['file_location_idfile_location'] = 1;
        $data['file_type_idfile_type'] = 1;
        $this->db->insert('file', $data);
        $data2['article_idarticle'] = $idNews;
        $data2['file_idfile'] = $this->db->lastInsertId();
        $this->db->insert('article_has_file', $data2);
        /* Con esto se pone como imagen por defecto*/
    }
    public function deleteImage($idImg){
        return $this->db->delete('file', '`idfile` = '.$idImg);
    }
    public function defaultImg($idNews,$idImg){
        $data['main_idfile'] = $idImg;
        $this->db->update('article', $data, 'idarticle = ' . $idNews);
    }

}