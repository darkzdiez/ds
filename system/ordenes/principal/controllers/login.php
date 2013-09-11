<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();    
    }
    
    function index() {  
        Session::destroy();
        unset($_SESSION);
        $this->view->render('login/index');
    }
    
    function run() {
        $this->model->run();
    }
    

}