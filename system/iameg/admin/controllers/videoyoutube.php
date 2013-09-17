<?php

class Videoyoutube extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . PATH_NAV . 'login');
            exit;
        }
        $this->view->js = array('videoyoutube/js/default.js');
    }

    public function index() {
        $this->view->render('videoyoutube/index');
    }
    public function crear() {
        $this->model->insertarVideo($_POST);
        print json_encode(array('mensaje' => 'Listo', 'fn' => 'insertarVideo', 'idvideo' => $_POST['idvideoyoutube']));
    }
    public function listasrep(){
        print json_encode($this->model->listasrep());
    }
    public function listarvideos($idlista){
        print json_encode($this->model->listarvideos($idlista));
    }
}