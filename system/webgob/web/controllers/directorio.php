<?php

class Directorio extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $_POST['TITLE_WEBSITE'] = 'Directorio Ejecutivo ' . TITLE_WEBSITE;
        $this->view->render('directorio/index');
    }
    function listado() {
        $_POST['TITLE_WEBSITE'] = 'Directorio: ' . 'Tren Ejecutivo' . ' en ' . TITLE_WEBSITE;
        $this->view->render('directorio/listado');
    }

}

?>