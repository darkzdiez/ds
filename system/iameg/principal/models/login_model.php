<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run(){
        $data = $this->db->select("SELECT iduser, login, role FROM app_user WHERE login = :login AND password = :password", array(
            ':login' => $_POST['login'],
            ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
        ));
        //exit("SELECT iduser, role FROM app_user WHERE login = '".$_POST['login']."' AND password = '".Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)."'");
        $count = count($data, COUNT_RECURSIVE);
        if ($count > 0) {
            // login
            Session::init();
            Session::set('role', $data[0]['role']);
            Session::set('loggedIn', true);
            Session::set('login', $data[0]['login']);
            Session::set('iduser', $data[0]['iduser']);
            if(isset($_POST['redirect'])){
                $redirect=PATH_NAV.$_POST['redirect'];
            }else{
                $redirect=PATH_NAV;
            }
            header('location: '.$redirect);
        } else {
            if(isset($_POST['redirect'])){
                $redirect=PATH_NAV.$_POST['redirect'];
            }else{
                $redirect=PATH_NAV.'login';
            }
            header('location: '.$redirect);
        }
        
    }
    
}