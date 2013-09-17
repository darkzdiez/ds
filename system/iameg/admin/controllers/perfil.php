<?php

class perfil extends Controller {

    function __construct(){
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            $this->view->redirect='perfil';
            $this->view->render('login/index');
            exit();
        }
        $this->view->js = array('perfil/js/default.js');
        $this->view->bc = array('Perfil' => 'perfil');
    }

    public function index($trash = NULL) {
        $this->view->institutos=$this->model->ListarInstitutos();
        $this->view->usuario=$this->model->usuario();
        $this->view->render('perfil/index');
    }
    function guardareditar(){
        $data=$this->model->guardareditar($_POST);
        $data['fn']='guardarEditarPerfil';
        print json_encode($data);
    }
    function guardareditarclave(){
        $data=$this->model->guardareditarclave($_POST);
        $data['fn']='guardarEditarPerfil';
        print json_encode($data);
    }
}
?>