<?php

class User_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userList()
    {
        return $this->db->select('SELECT iduser, login, role, nombres FROM app_user');
    }
    public function ListarInstitutos(){
        return $this->db->select('SELECT * FROM `institutos`');
    }
    
    public function userSingleList($userid)
    {
        return $this->db->select('SELECT userid, login, role FROM user WHERE userid = :userid', array(':userid' => $userid));
    }
    
    public function create($data)
    {
       if ($this->db->insert('app_user', $data)) {
            return array('guardo' => TRUE, "mensaje" => 'Los Datos se han guardado exitosamente', 'fn' => 'guardaruser');
        }
        else {
            if($this->db->_ERROR[1]==1062){
                return array('guardo' => FALSE, "mensaje" => 'El Nombre de Usuario: '.$data['login'].', ya esta en uso', 'fn' => 'guardaruser');
            }else{
                return array('guardo' => FALSE, "mensaje" => 'Los Datos no se han guardado', 'fn' => 'guardaruser');
            }
        }
    }
    
    public function editSave($data)
    {
        $postData = array(
            'login' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        );
        
        $this->db->update('user', $postData, "`userid` = {$data['userid']}");
    }
    
    public function delete($userid)
    {
        $result = $this->db->select('SELECT role FROM user WHERE userid = :userid', array(':userid' => $userid));

        if ($result[0]['role'] == 'owner')
        return false;
        
        $this->db->delete('user', "userid = '$userid'");
    }

}