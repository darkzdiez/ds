<?php

class base_soporte extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $this->view->bc = array('Soporte' => 'soporte');
        $this->view->js = array('soporte/js/default.js');
    }
    
    function index() {  
        $this->view->render('soporte/index');
    }

    function enviarmensaje(){
    	print json_encode($this->model->enviarmensaje($_POST));
    }
}