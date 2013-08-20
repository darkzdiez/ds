<?php

class Galeria extends Controller {

    public function index() {
        $_POST['TITLE_WEBSITE'] = 'Galeria en ' . TITLE_WEBSITE;
        $this->view->render('galeria/index');
    }

    public function photo() {
        $this->view->model=$this->model;
        $this->view->render('galeria/photo');
    }
    public function movie() {
        $this->view->render('galeria/movie');
    }
    public function seePhoto($idGaleria) {
        $this->view->idGaleria=$idGaleria;
        $this->view->model=$this->model;
        $this->view->render('galeria/seePhoto');
    }

}

?>