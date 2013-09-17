<?php

class ccontrataciones_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function singleList() {
        return $this->db->select('SELECT * FROM `ccontrataciones` ORDER BY `ccontrataciones`.`id` DESC');
    }

    public function singleSearch($id) {
        return $this->db->select('SELECT * FROM `ccontrataciones` WHERE id = :id', array(':id' => $id));
    }

    public function create($data) {
        $data['status'] = 0;
        if ($this->db->insert('ccontrataciones', $data)) {
            $data = array('id' => $this->db->lastInsertId(), 'titulo' => $data['titulo'], 'denominacion' => $data['denominacion']);
            $data['mensaje'] = 'Se a Agregado Correctamente este llamado';
            $data['fn'] = 'llamadoGuardado';
        } else {
            $data = array('result_error' => 'Se a producido un error al guardar.');
        }
        return json_encode($data);
    }

    public function editSave($data, $id) {
        if ($this->db->update('ccontrataciones', $data, "`id` = {$id}")) {
            $data['messageAction'] = 'Se a Editado Correctamente este llamado';
        } else {
            $data = array('result_error' => 'Se a producido un error al Editar.');
        }
        echo json_encode($data);
    }

    public function disable($id) {
        $postData = array(
            'status' => '1'
        );
        if ($this->db->update('ccontrataciones', $postData, "`id` = $id")) {
            $data = array('messageAction' => 'Se a Desactivado Correctamente este llamado');
        } else {
            $data = array('result_error' => 'Se a producido un error al Desactivar.');
        }
        echo json_encode($data);
    }

    public function enable($id) {
        $postData = array(
            'status' => '0'
        );
        if ($this->db->update('ccontrataciones', $postData, "`id` = $id")) {
            $data = array('messageAction' => 'Se a Activado Correctamente este llamado');
        } else {
            $data = array('result_error' => 'Se a producido un error al Activar.');
        }
        echo json_encode($data);
    }

}