<?php

class Instituto extends Controller {

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
        $this->view->js = array('instituto/js/default.js');
    }
    
    public function index() 
    {
        $this->view->listInstituto = $this->model->ListarInstitutos();
        $this->view->render('instituto/index');
    }

    public function listarinstitutos(){
        print json_encode($this->model->ListarInstitutos());
    }
    
    public function crear(){
        $this->view->render('instituto/crear');
    }
    public function guardarcrear(){
        $data = array();
        $data['nombre'] = $_POST['nombre'];
                
        print json_encode($this->model->create($data));
    }
    
    public function edit($id) 
    {
        $this->view->instituto = $this->model->institutoSingleList($id);
        $this->view->render('instituto/editar');
    }
    
    public function delete($id)
    {
        $this->model->delete($id);
        header('location: ' . PATH_NAV . 'instituto');
    }

    public function editSave($id)
    {
        $data = array();
        $data['id'] = $id;
        $data['nombre'] = $_POST['nombre'];
        // @TODO: Do your error checking!
        
        print json_encode($this->model->editSave($data));
        //header('location: ' . PATH_NAV . 'instituto');
    }
}