<?php

class base_user extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . PATH_NAV . 'login');
            exit;
        }
        $this->view->js = array('user/js/default.js');
        $this->view->css = array('public/css/old_form.css');
    }

    public function index() {
        $this->view->userList = $this->model->userList();
        $profile = $this->distinctLoadModel('profile');
        foreach ($this->view->userList as $key => $value) {
            $this->view->userProfilesList[$value['iduser']]=$profile->userProfilesList($value['iduser']);
        }
        $this->view->render('user/index');
    }

    public function create() {
        $data = array();
        $data['nameuser'] = $_POST['nameuser'];
        $data['password'] = $_POST['password'];

        // @TODO: Do your error checking!

        $this->model->create($data);
        // header('location: ' . PATH_NAV . 'user');
    }

    public function edit($id) {
        $this->view->user = $this->model->userSingleList($id);
        $profile = $this->distinctLoadModel('profile');
        $this->view->listProfile = $profile->singleList();
        $userProfilesList = $profile->userProfilesList($id);
        $resultUserProfileList=array();
        foreach ($userProfilesList as $key => $value) {
            $resultUserProfileList[$value['idprofile']]=$value;
        }
        $this->view->userProfilesList=$resultUserProfileList;
        $this->view->render('user/edit');
    }

    public function editSave($id) {
        $data = $_POST;
        $data['iduser'] = $id;

        // @TODO: Do your error checking!

        $this->model->editSave($data);
        header('location: ' . PATH_NAV . 'user/edit/'.$id);
    }

    public function delete($id) {
        $this->model->delete($id);
        header('location: ' . PATH_NAV . 'user');
    }

}