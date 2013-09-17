<?php

class Goods extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit;
        }

        $this->view->js = array('goods/js/default.js');
    }

    function index() {
        $this->view->goodsList = $this->model->xhrGetListings();
        $this->view->render('goods/index');
    }

    function xhrInsert() {
        $this->model->xhrInsert($_POST);
    }

    function xhrGetListings() {
        $this->model->xhrGetListings();
    }

    function xhrDeleteListing() {
        $this->model->xhrDeleteListing();
    }

}