<?php

class GaleriaController extends Controller {

    public function index() {
        $_POST['TITLE_WEBSITE'] = 'Galeria en ' . TITLE_WEBSITE;
        $this->view->render('galeria/index.php');
    }

    public function photo() {
        $this->view->render('galeria/photo.php');
    }
    public function movie() {
        $this->view->render('galeria/movie.php');
    }
    public function seePhoto() {
        $this->view->render('galeria/seePhoto.php');
    }

}

?>