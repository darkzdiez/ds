<?php

class Profile extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . PATH_NAV . 'login');
            exit;
        }
        $this->view->js = array('profile/js/default.js');
        $this->view->css = array('public/css/old_form.css');
    }

    public function index() {
        $this->view->singleList = $this->model->singleList();
        $this->view->formAction = PATH_NAV . 'profile/create/';
        $this->view->display = 'none';
        $this->view->render('profile/index');
    }

    public function create() {
        $data = $_POST;
        // @TODO: Do your error checking!

        $this->model->create($data);
        // header('location: ' . PATH_NAV . 'user');
    }

    public function edit($id) {
        $this->view->profile = $this->model->singleSearch($id);
        $this->view->formAction = PATH_NAV . 'profile/editSave/' . $id;
        $this->view->display = 'block';
        $this->view->render('profile/profile_form', true);
    }

    public function editSave($id) {
        $data = $_POST;
        $this->model->editSave($data, $id); //
    }

    public function disable($id) {
        $this->model->disable($id);
    }

    public function enable($id) {
        $this->model->enable($id);
    }

}