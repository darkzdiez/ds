<?php

class method_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function singleList() {
        return $this->db->select('SELECT * FROM `method` ORDER BY `method`.`idmethod` DESC');
    }

    public function singleSearch($id) {
        return $this->db->select('SELECT * FROM `method` WHERE idmethod = :id', array(':id' => $id));
    }

    public function controllerMethodsList($id) {
        return $this->db->select("SELECT * FROM `method` WHERE `method`.`idcontroller` = :id", array(':id' => $id));
    }

    public function create($data, $idcontroller) {
        $data['idcontroller'] = $idcontroller;
        if ($this->db->insert('method', $data)) {
            $data = array('id' => $this->db->lastInsertId(), 'name' => $data['name']);
            $data['messageAction'] = 'Se a Agregado Correctamente este Metodo';
        } else {
            $data = array('result_error' => 'Se a producido un error al guardar el Metodo.');
        }
        echo json_encode($data);
    }

    public function remove($id) {
        if ($this->db->delete('method', "idmethod = '$id'")) {
            $data['messageAction'] = 'Se a Eliminado Correctamente este Metodo';
        } else {
            $data = array('result_error' => 'Se a producido un error al Eliminado el Metodo.');
        }
        echo json_encode($data);
    }

}