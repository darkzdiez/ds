<?php

class Soporte extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $this->view->bc = array('Soporte' => 'soporte');
    }
    
    function index() {  
        $this->view->render('soporte/index');
    }

}