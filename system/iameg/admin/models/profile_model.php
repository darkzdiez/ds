<?php

class profile_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function singleList() {
        return $this->db->select('SELECT * FROM `profile` ORDER BY `profile`.`idprofile` DESC');
    }

    public function singleSearch($id) {
        return $this->db->select('SELECT * FROM `profile` WHERE idprofile = :id', array(':id' => $id));
    }

    public function userProfilesList($id) {
        $profile = $this->db->prepare("SELECT `profile`.`idprofile`, `profile`.`name` FROM user_has_profile
LEFT JOIN `profile` ON `user_has_profile`.`profile_idprofile` = `profile`.`idprofile` WHERE `user_has_profile`.`user_iduser`=:iduser");
        $profile->execute(array(
            ':iduser' => $id,
        ));
        $array=array();
        while ($listProfile = $profile->fetch()) {
            $array[] = array('idprofile'=>$listProfile['idprofile'], 'name'=>$listProfile['name']);
        }
        return $array;
    }

    public function create($data) {
        $data['status'] = 0;
        if ($this->db->insert('profile', $data)) {
            $data = array('id' => $this->db->lastInsertId(), 'name' => $data['name'], 'description' => $data['description']);
            $data['messageAction'] = 'Se a Agregado Correctamente este llamado';
        } else {
            $data = array('result_error' => 'Se a producido un error al guardar.');
        }
        echo json_encode($data);
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
        if ($this->db->update('profile', $postData, "`idprofile` = $id")) {
            $data = array('messageAction' => 'Se a Desactivado Correctamente este Perfil');
        } else {
            $data = array('result_error' => 'Se a producido un error al Desactivar.');
        }
        echo json_encode($data);
    }

    public function enable($id) {
        $postData = array(
            'status' => '0'
        );
        if ($this->db->update('profile', $postData, "`idprofile` = $id")) {
            $data = array('messageAction' => 'Se a Activado Correctamente este Perfil');
        } else {
            $data = array('result_error' => 'Se a producido un error al Activar.');
        }
        echo json_encode($data);
    }

}