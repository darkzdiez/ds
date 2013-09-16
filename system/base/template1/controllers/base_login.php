<?php

class base_login extends Controller {

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
    }

}