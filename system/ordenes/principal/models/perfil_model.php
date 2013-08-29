<?php

class Perfil_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    public function ListarInstitutos(){
        return $this->db->select('SELECT * FROM `institutos`');
    }
    public function usuario(){
        return $this->db->select('SELECT *  FROM `app_user` WHERE `iduser` = :iduser', array(':iduser' => Session::get('iduser')));
    }
    public function guardareditar($postData){
    	$data['nombres']=$postData['nombres'];
    	$data['email']=$postData['email'];
    	$data['cargo']=$postData['cargo'];
    	$data['id_instituto']=$postData['instituto'];
        if($this->db->update('app_user', $data, "`iduser` = " . Session::get('iduser'))){
            return array("mensaje" => 'Datos del Perfil editados correctamente.');
        }else{
            return array("mensaje" => 'No se pudo Editar su perfil.');
        }
    }
    public function guardareditarclave($postData){
        if($postData['password']=='123'){
            Session::set('seguridadPass', 'b');
        }else{
            Session::set('seguridadPass', 'm');
        }
    	$data['password']=Hash::create('sha256', $postData['password'], HASH_PASSWORD_KEY);
        if($this->db->update('app_user', $data, "`iduser` = " . Session::get('iduser'))){
            return array("mensaje" => 'Clave cambiada correctamente.', 'seguridadPass' => Session::get('seguridadPass'));
        }else{
            return array("mensaje" => 'No se pudo cambiar la clave.');
        }
    }
}
?>