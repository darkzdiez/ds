<?php

class User_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function userList() {
        return $this->db->select('SELECT iduser, nameuser FROM user');
    }

    public function userSingleList($id) {
        return $this->db->select('SELECT iduser, nameuser FROM user WHERE iduser = :id', array(':id' => $id));
    }

    public function create($data) {
        if ($this->db->insert('user', array(
                    'nameuser' => $data['nameuser'],
                    'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY)
                ))) {
            $data = array('id' => $this->db->lastInsertId(), 'nameuser' => $data['nameuser']);
        } else {
            $data = array('result_error' => 'El nombre existe.');
        }
        echo json_encode($data);
    }

    public function editSave($data) {
        $postData = array(
            'nameuser' => $data['nameuser'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
        );
        $this->db->update('user', $postData, "`iduser` = {$data['iduser']}");
        $this->db->delete('user_has_profile', "`user_iduser` = '" . $data['iduser'] . "'", 100);
        foreach ($data['profile'] as $key => $value) {
            $profile = array('user_iduser' => $data['iduser'], 'profile_idprofile' => $value);
            $this->db->insert('user_has_profile', $profile);
        }
    }

    public function delete($id) {
        $this->db->delete('user', "iduser = '$id'");
    }

}