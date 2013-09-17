<?php

class Ccontrataciones extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit;
        }
        $this->view->js = array('ccontrataciones/js/default.js');
        $this->view->css = array('public/css/old_form.css');
    }

    public function index() {
        $this->view->singleList = $this->model->singleList();
        $this->view->formAction = PATH_NAV . 'ccontrataciones/create/';
        $this->view->display = 'none';
        $this->view->render('ccontrataciones/index');
    }

    public function genpdf($id) {
        $result=$this->model->singleSearch($id);
        $this->view->var=$result[0];
        $data['location'] = 'ccontrataciones/pdf';
        $data['autor'] = 'Gobernacion del Estado Yaracuy';
        $data['title'] = 'Llamado a Concurso Abierto ' . $result[0]['titulo'];
        $data['subject'] = 'COMISIÓN ÚNICA DE CONTRATACIONES DE ' . $result[0]['actividad'] . ' DE LA GOBERNACIÓN DEL ESTADO YARACUY';
        $data['keywords'] = 'llamado, concurso, abierto';
        $data['output'] = 'llamado-' . $result[0]['titulo'] . '.pdf';
        $this->view->genPDF($data);
    }
    public function printLast(){
        
    }
    public function create() {
        /* Subir PDF */
        $upload = new Upload();
        $PATH_DIR='system/webgob/media/ccontrataciones/';
        $dir = $PATH_DIR;
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        chmod($dir, 0755);
        $upload->_dir = $dir;
        $upload->_key = 'file';
        $upload->_fileName = $_POST['titulo'] . '.pdf';
        $run = $upload->run();
        if ($run != FALSE) {
            print "<script>parent.rsi(" . $this->model->create($_POST). "); </script>";
        } else {

        }
    }

    public function edit($id) {
        $this->view->ccontrataciones = $this->model->singleSearch($id);
        $this->view->formAction = URL . 'ccontrataciones/editSave/' . $id;
        $this->view->display = 'block';
        $this->view->render('ccontrataciones/ccontrataciones_form', true);
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