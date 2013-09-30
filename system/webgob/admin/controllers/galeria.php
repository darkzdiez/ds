<?php

class Galeria extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit;
        }
        $this->view->js = array('directorio/js/default.js');
    }

    public function index() {
        $this->view->singleList = $this->model->singleList();
        $this->view->formAction = PATH_NAV . 'directorio/creargrupo/';
        $this->view->display = 'none';
        $this->view->action = 'creargrupo';
        $this->view->render('galeria/index');
    }
    public function creargrupo(){
        print json_encode($this->model->creargrupo($_POST));
    }
    public function upload($id){
        $upload_handler = new UploadHandler(
            array(
                'script_url' => PATH_NAV . 'orden/upload/',
                'upload_dir' => PATH_SYSTEM_L . '/media/images/galeria/' . $id . '/',
                'upload_url' => PATH_SYSTEM . 'media/images/galeria/' . $id . '/'/*,
                'delete_type' => 'POST'*/
            )
        );
    }
}