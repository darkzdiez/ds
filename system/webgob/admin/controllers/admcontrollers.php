<?php

class AdmControllers extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . PATH_NAV . 'login');
            exit;
        }
        $this->view->js = array('admcontrollers/js/default.js');
        $this->view->css = array('public/css/old_form.css');
    }

    public function index() {
        $this->view->singleList = $this->model->singleList();
        $this->view->formAction = PATH_NAV . 'admcontrollers/create/';
        $this->view->display = 'none';
        $this->view->render('admcontrollers/index');
    }

    public function create() {
        $data = $_POST;
        // @TODO: Do your error checking!

        $this->model->create($data);
        // header('location: ' . PATH_NAV . 'user');
    }

    public function edit($id) {
        $this->view->admcontrollers = $this->model->singleSearch($id);
        $method = $this->distinctLoadModel('method');
        $this->view->methodsList = $method->controllerMethodsList($id);
        $this->view->formAction = PATH_NAV . 'admcontrollers/editSave/' . $id;
        $this->view->formActionAddMethod = PATH_NAV . 'method/create/' . $id;
        $this->view->display = 'block';
        $this->view->render('admcontrollers/admcontrollers_form', true);
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