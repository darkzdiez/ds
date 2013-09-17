<?php

class News extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . PATH_NAV . 'login');
            exit;
        }
        $this->view->js = array('news/js/default.js');
        $this->view->css = array('public/css/old_form.css');
    }

    public function index() {
        //exit(print_r(Pagination::extract(10)));
        $this->view->singleList = $this->model->singleList();
        $category = $this->distinctLoadModel('categorynews');
        $this->view->category = $category->singleSearch(4);
        $this->view->location = $category->singleSearch(5);
        $this->view->formAction = PATH_NAV . 'news/create/';
        $this->view->display = 'none';
        $this->view->render('news/index');
    }
    public function agregar() {
        //exit(print_r(Pagination::extract(10)));
        $this->view->js = array('news/js/default.js', 'news/js/editar.js');
        $this->view->proceso='agregar';
        $this->view->singleList = $this->model->singleList();
        $category = $this->distinctLoadModel('categorynews');
        $this->view->category = $category->singleSearch(4);
        $this->view->location = $category->singleSearch(5);
        $this->view->formAction = PATH_NAV . 'news/create/';
        $this->view->formAction2 = PATH_NAV . 'news/addcontent/';
        $this->view->display = 'block';
        $this->view->display2 = 'none';
        $this->view->render('news/news_form');
    }

    public function create() {
        $data = $_POST;
        // @TODO: Do your error checking!

        $this->model->create($data);
        // header('location: ' . PATH_NAV . 'user');
    }

    public function edit($id) {
        $this->view->news = $this->model->singleSearch($id);
        $category = $this->distinctLoadModel('categorynews');
        $this->view->category = $category->singleSearch(4);
        $this->view->location = $category->singleSearch(5);
        $this->view->formAction = PATH_NAV . 'news/editSave/' . $id;
        $this->view->formAction2 = PATH_NAV . 'news/addcontent/';
        $this->view->display = 'block';
        $this->view->display2 = 'none';
        $this->view->render('news/news_form', true);
    }

    public function images($id) {
        $images = $this->systemLoadModel('image');
        $this->view->images = $images->singleSearch($id);
        $this->view->idnews=$id;
        $this->view->formAction = PATH_NAV . 'image/save/' . $id;
        $this->view->display = 'block';
        $this->view->render('news/images_form', true);
    }
    public function addcontent(){
        if ($this->model->addcontent($_POST)) {
            print json_encode(array('mensaje' => 'Noticia Agregada satisfactoriamente', 'fn'=>'savedNews2'));
        }
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