<?php

class Banner extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit;
        }
        $this->view->js = array('banner/js/default.js');
    }

    public function index() {
        $this->view->render('banner/index');
    }

    public function listar() {
        print json_encode($this->model->listar());
    }

    public function upload($id){
        $upload_handler = new UploadHandler(
            array(
                'script_url' => PATH_NAV . 'banner/upload/' . $id . '/',
                'upload_dir' => PATH_SYSTEM_L . '/media/images/banner/' . $id . '/',
                'upload_url' => PATH_SYSTEM . '/media/images/banner/' . $id . '/'
            )
        );
    }
}