<?php

class base_login_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function run() {
        $sth = $this->db->prepare("SELECT idusuario, nombreusuario FROM usuario WHERE 
				nombreusuario = :login AND clave = :password");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
        ));

        $data = $sth->fetch();
        $count = $sth->rowCount();
        if ($count > 0) {
            // login
            $time=time()+60*60*24;
            if (isset($_POST['recordarme'])) {
                setcookie('recordarme','ab', $time, SESSIONPATH);
                $recordar=true;
            }else{
                setcookie('recordarme','ac', $time, SESSIONPATH);
                $recordar=false;
            }
            Session::init($recordar);
            Session::set('iduser', $data['idusuario']);
            Session::set('nameuser', $data['nombreusuario']);
            Session::set('sessionTime', date('r'));
            Session::set('loggedIn', true);
            $data = array('fn'=>'postLogin', 'url' => PATH_NAV . 'index');
        } else {
            $data = array('fn'=>'postLogin', 'result_error' => 'Error al iniciar Sesion ' . Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY));
        }
        echo json_encode($data);
    }

}