<?php

class User extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false or Session::get('role') != 1) {
            Session::destroy();
            $this->view->redirect='orden';
            $this->view->render('login/index');
            exit();
        }
        $this->view->js = array('user/js/default.js');
    }
    
    public function index() 
    {
        $this->view->userList = DS::_utf8_encode($this->model->userList());
        $this->view->render('user/index');
    }
    
    public function crear(){
        $this->view->institutos=$this->model->ListarInstitutos();
        $this->view->render('user/crear');
    }
    public function guardarcrear(){
        $data = array();
        $data['login'] = $_POST['login'];
        $data['nombres'] = $_POST['nombres'];
        $data['password'] = Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY);
        $data['id_instituto'] = $_POST['instituto'];
        $data['cargo'] = $_POST['cargo'];
        $data['email'] = $_POST['email'];
        $data['role'] = $_POST['perfil'];
                
        print json_encode($this->model->create($data));
    }
    
    public function edit($id) 
    {
        $this->view->user = $this->model->userSingleList($id);
        $this->view->render('user/edit');
    }
    public function permisos($id){
        $this->view->render('user/permisos');
    }
    public function editSave($id)
    {
        $data = array();
        $data['id'] = $id;
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];
        
        // @TODO: Do your error checking!
        
        $this->model->editSave($data);
        header('location: ' . URL . 'user');
    }
    public function listaruser(){
        print json_encode($this->model->userList());
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . URL . 'user');
    }
}