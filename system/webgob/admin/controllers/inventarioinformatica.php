<?php

class InventarioInformatica extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit;
        }
        $this->view->js = array('inventarioinformatica/js/default.js');
    }

    public function index() {
        $this->view->render('inventarioinformatica/index');
    }

    public function dependenciaList($idparent) {
        $array = $this->model->dependenciaList($idparent);
        foreach ($array as $value) {
            $depurate[] = array_map('utf8_encode', $value);
        }
        if (isset($depurate)) {
            print json_encode($depurate);
        }
    }

    public function edit($id) {
        $this->view->news = $this->model->singleSearch($id);
        $category = $this->loadModel('categorynews');
        $this->view->category = $category->singleSearch(4);
        $this->view->location = $category->singleSearch(5);
        $this->view->formAction = URL . 'news/editSave/' . $id;
        $this->view->display = 'block';
        $this->view->render('news/news_form', true);
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