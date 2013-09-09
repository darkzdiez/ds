<?php

class Videoyoutube extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . PATH_NAV . 'login');
            exit;
        }
        $this->view->js = array('videoyoutube/js/default.js');
    }

    public function index() {
        $this->view->render('videoyoutube/index');
    }

}