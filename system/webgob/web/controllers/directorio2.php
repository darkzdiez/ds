<?php

class Directorio2 extends Controller {

    public function index() {
        $_POST['TITLE_WEBSITE'] = 'Directorio Ejecutivo en ' . TITLE_WEBSITE;
        $this->view->model=$this->model;
        $this->view->render('directory/index');
    }

}

?>