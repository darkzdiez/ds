<?php

class Error extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->msg = 'Esta Pagina no Existe';
        $this->view->render('error/index');
    }

}