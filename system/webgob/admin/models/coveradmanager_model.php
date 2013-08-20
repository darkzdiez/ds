<?php

/* Conjunto de Scripts
 * Copyright (c) 2013 - Alfonzo Diez (+58 416 753 1889 - alfonzodiez@gmail.com)
 * http://www.diezsoluciones.com/
 * Utilizando en la librería coveradmanager_model
 * Created on : 10/01/2013 02:40:08 PM
 * Author     : alfonzo
 * Revision   : 01
 * La reproducción, utilización, venta y copia no autorizada de alguno de los scripts en este archivo esta prohibida totalmente.
 * The reproduction, use, sell unauthorized copies of any of the scripts in this file is prohibited entirely.
 */

/*
 * Description:
 * 
 */

class coveradmanager_model extends Model {

    public function singleList() {
        return $this->db->select('SELECT * FROM `cover_ad` ORDER BY `cover_ad`.`id` DESC ');
    }

    public function singleSearch($id) {
        return $this->db->select('SELECT * FROM `cover_ad` WHERE `id`=:id', array(':id' => $id));
    }

    public function create($array) {
        $data['toptitle'] = $array['toptitle'];
        $data['title'] = $array['title'];
        if(isset($array['dtexto']) AND $array['dtexto']==1){
            $data['dtexto']=1;
        }else{
            $data['dtexto']=0;
        }
        $data['description'] = $array['description'];
        $data['user_iduser'] = Session::get('iduser');
        $data['status'] = 0;
        $this->db->insert('cover_ad', $data);
        return $this->db->lastInsertId();
    }

    public function saveImage($name) {
        $data['filename'] = $name;
        $data['description'] = $name;
        $data['file_location_idfile_location'] = 3;
        $data['file_type_idfile_type'] = 1;
        $this->db->insert('file', $data);
        return $this->db->lastInsertId();
    }

    public function updateImage($idcover, $idfile) {
        $data['file_idfile'] = $idfile;
        $this->db->update('cover_ad', $data, '`id` = ' . $idcover);
    }

    public function deleteFailSave($id) {
        $this->db->delete('cover_ad', '`id` = ' . $id);
        $this->db->select('ALTER TABLE `cover_ad` AUTO_INCREMENT = ' . ($id - 1));
    }

    public function disable($id) {
        $postData = array(
            'status' => '0'
        );
        if ($this->db->update('cover_ad', $postData, "`id` = $id")) {
            $data = array('messageAction' => 'Se a Desactivado Correctamente esta Portada');
        } else {
            $data = array('result_error' => 'Se a producido un error al Desactivar.');
        }
        echo json_encode($data);
    }

    public function enable($id) {
        $postData = array(
            'status' => '1'
        );
        if ($this->db->update('cover_ad', $postData, "`id` = $id")) {
            $data = array('messageAction' => 'Se a Activado Correctamente esta Portada');
        } else {
            $data = array('result_error' => 'Se a producido un error al Activar.');
        }
        echo json_encode($data);
    }

}

?>
