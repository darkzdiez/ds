<?php

class method extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit;
        }
    }

    public function index() {
        print 'error';
    }

    public function create($idcontroller) {
        $data = $_POST;
        $this->model->create($data, $idcontroller);
    }

    public function edit($id) {
        $this->view->admcontrollers = $this->model->singleSearch($id);
        $method = $this->loadModel('method');
        $this->view->methodsList = $method->controllerMethodsList($id);
        $this->view->formAction = URL . 'admcontrollers/editSave/' . $id;
        $this->view->display = 'block';
        $this->view->render('admcontrollers/admcontrollers_form', true);
    }

    public function editSave($id) {
        $data = $_POST;
        $this->model->editSave($data, $id); //
    }

    public function remove($id) {
        $this->model->remove($id);
    }

}