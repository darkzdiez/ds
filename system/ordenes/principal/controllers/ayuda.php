<?php

class Ayuda extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $this->view->bc = array('Ayuda' => 'ayuda');
    }
    
    function index() {  
        $this->view->render('ayuda/index');
    }

}