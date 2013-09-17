<?php

class Image extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit;
        }
    }

    public function index() {
        header('location: ' . URL);
    }

    public function save($idNews) {
        $upload = new Upload();
        $PATH_DIR='system/webgob/media/images/news/';
        $dir = $PATH_DIR . $idNews . '/';
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        chmod($dir, 0755);
        $upload->_dir = $dir;
        $upload->_key = 'file';
        $run = $upload->run();
        if ($run != FALSE) {
            /* Guardar IMG db */
            $data['messageAction'] = 'Imagenes cargadas con exito.';
            $images = $this->systemLoadModel('image');
            $images->saveImage($run['filename'], $idNews);
            print "<script>parent.resultSubmitImages(" . json_encode($data) . "); </script>";
            //$this->view->render('news/images_form', true);
        } else {
            $data['messageAction'] = 'No se pudo guardar la imagen.';
            print "<script>parent.resultSubmitImages(" . json_encode($data) . "); </script>";
        }
    }

    public function deleteImg($idImg) {
        $images = $this->systemLoadModel('image');
        $images->deleteImage($idImg);
    }
    public function defaultImg($idNews,$idImg) {
        $images = $this->systemLoadModel('image');
        $images->defaultImg($idNews,$idImg);
    }

}