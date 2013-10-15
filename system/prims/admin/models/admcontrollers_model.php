<?php

class admControllers_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function singleList() {
        return $this->db->select('SELECT * FROM `controller` ORDER BY `controller`.`idcontroller` DESC');
    }

    public function singleSearch($id) {
        return $this->db->select('SELECT * FROM `controller` WHERE idcontroller = :id', array(':id' => $id));
    }

    public function create($data) {
        $data['status'] = 0;
        if ($this->db->insert('controller', $data)) {
            $data = array('id' => $this->db->lastInsertId(), 'name' => $data['name'], 'description' => $data['description']);
            $data['messageAction'] = 'Se a Agregado Correctamente este Controlador';
        } else {
            $data = array('result_error' => 'Se a producido un error al guardar.');
        }
        echo json_encode($data);
    }

    public function editSave($data, $id) {
        if ($this->db->update('controller', $data, "`idcontroller` = {$id}")) {
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
        if ($this->db->update('controller', $postData, "`idcontroller` = $id")) {
            $data = array('messageAction' => 'Se a Desactivado Correctamente este Controlador.');
        } else {
            $data = array('result_error' => 'Se a producido un error al Desactivar este Controlador.');
        }
        echo json_encode($data);
    }

    public function enable($id) {
        $postData = array(
            'status' => '0'
        );
        if ($this->db->update('controller', $postData, "`idcontroller` = $id")) {
            $data = array('messageAction' => 'Se a Activado Correctamente este Controlador.');
        } else {
            $data = array('result_error' => 'Se a producido un error al Activar este Controlador.');
        }
        echo json_encode($data);
    }

}