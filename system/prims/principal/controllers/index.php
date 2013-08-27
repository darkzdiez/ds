<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false or Session::get('role') != 1) {
            Session::destroy();
            $this->view->redirect='orden';
            $this->view->render('index/index');
            exit();
        }
    }

    function index() {
        //echo Hash::create('sha256', 'jesse', HASH_PASSWORD_KEY);
        //echo Hash::create('sha256', 'test2', HASH_PASSWORD_KEY);
        $this->view->render('index/index');
    }

    function details() {
        $this->view->render('index/index');
    }

}