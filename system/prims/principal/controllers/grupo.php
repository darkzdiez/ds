<?php

class Grupo extends Controller {

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
        $this->view->js = array('grupo/js/default.js');
    }
    
    public function index() 
    {
        $this->view->userList = $this->model->userList();
        $this->view->render('grupo/index');
    }
    
    public function crear(){
        $this->view->render('user/crear');
    }
    public function guardarcrear(){
        $data = array();
        $data['login'] = $_POST['login'];
        $data['password'] = $_POST['password'];
        $data['role'] = 0;
                
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