<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $this->view->js = array('login/js/default.js');
    }

    function index() {
        Session::destroy();
        $this->view->js = array('login/js/default.js');
        $this->view->render('login/index');
    }

    function run() {
        $this->model->run();
    }

    function logout() {
        Session::destroy();
        $this->view->js = array('login/js/default.js');
        $this->view->render('login/index');
        exit;
    }

}