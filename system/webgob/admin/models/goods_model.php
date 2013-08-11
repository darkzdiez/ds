<?php

class Goods_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function xhrInsert($data) {
        if ($this->db->insert('goods', $data)) {
            $data = array('id' => $this->db->lastInsertId(), 'name_article' => $data['name_article'], 'mark' => $data['mark'], 'model' => $data['model']);
            $data['messageAction'] = '<strong>Bien</strong> agregado con exito';
        } else {
            $data = array('result_error' => 'No se a podido guardar el bien.');
        }
        echo json_encode($data);
    }

    public function xhrGetListings() {
        return $this->db->select("SELECT * FROM `goods`");
    }

    public function xhrDeleteListing() {
        $id = (int) $_POST['id'];
        $this->db->delete('data', "id = '$id'");
    }

}