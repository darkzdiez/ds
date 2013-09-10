<?php

class videoyoutube_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    public function insertarVideo($postData){
        $data['idyoutube']=$postData['idvideoyoutube'];
        $data['idvideoyoutubegrupo']=$postData['listaactiva'];
        return $this->db->insert('videoyoutube', $data);
    }
    public function listasrep(){
        return $this->db->select('SELECT * FROM `videoyoutubegrupo`');
    }
    public function listarvideos($idlista){
        return $this->db->select("SELECT * FROM `videoyoutube` WHERE `idvideoyoutubegrupo` = :idlista ORDER BY `id` DESC", array(':idlista' => $idlista));
    }
    public function disable($id) {
        $postData = array(
            'status' => '0'
        );
        if ($this->db->update('article', $postData, "`idarticle` = $id")) {
            $data = array('messageAction' => 'Se a Desactivado Correctamente esta Noticia');
        } else {
            $data = array('result_error' => 'Se a producido un error al Desactivar.');
        }
        echo json_encode($data);
    }

    public function enable($id) {
        $postData = array(
            'status' => '1'
        );
        if ($this->db->update('article', $postData, "`idarticle` = $id")) {
            $data = array('messageAction' => 'Se a Activado Correctamente esta Noticia');
        } else {
            $data = array('result_error' => 'Se a producido un error al Activar.');
        }
        echo json_encode($data);
    }

}