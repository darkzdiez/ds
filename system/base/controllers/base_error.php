<?php

class base_error extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->msg = 'Esta Pagina no Existe';
        $this->view->render('error/index');
    }

}