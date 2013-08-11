<?php

/* Conjunto de Scripts
 * Copyright (c) 2013 - Alfonzo Diez (+58 416 753 1889 - alfonzodiez@gmail.com)
 * http://www.diezsoluciones.com/
 * Utilizando en la librería coveradmanager
 * Created on : 09/01/2013 03:54:14 PM
 * Author     : alfonzo
 * Revision   : 01
 * La reproducción, utilización, venta y copia no autorizada de alguno de los scripts en este archivo esta prohibida totalmente.
 * The reproduction, use, sell unauthorized copies of any of the scripts in this file is prohibited entirely.
 */

/*
 * Description:
 * 
 */

class CoverAdManager extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit;
        }
        $this->view->js = array('coveradmanager/js/default.js');
    }

    function index() {
        $this->view->formAction = PATH_NAV . 'coveradmanager/create/';
        $this->view->display = 'none';
        $this->view->singleList = $this->model->singleList();
        $this->view->action = 'create';
        $this->view->id='';
        $this->view->render('coveradmanager/index');
    }

    function create() {
        $saveData = $this->model->create($_POST);
        if ($saveData != false) {
            $save = $this->saveImage($saveData);
            //print $save;
            //exit(print_r($save));
            if (is_array($save)) {
                $this->model->deleteFailSave($saveData);
                $return['messageAction'] = '<strong>NO</strong> se puede guardar esta Portada, por las siguientes Razones:<ul style="display: inline-block;">';
                foreach ($save['error'] as $value) {
                    $return['messageAction'].='<li>' . $value . '</li>';
                }
                $return['messageAction'].='</ul>';
            } else {
                $this->model->updateImage($saveData, $save);
                $return['messageAction'] = 'Se guardo Satisfactoriamente esta Portada';
            }
        } else {
            $return['messageAction'] = 'Ocurrio un error al guardar la Portada';
        }
        print "<script>parent.resultSubmitCoverAd(" . json_encode($return) . "); </script>";
    }

    public function saveImage($id) {
        $upload = new Upload();
        $dir = 'system/webgob/media/images/coverad/' . $id . '/';
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        chmod($dir, 0755);
        $upload->_dir = $dir;
        $upload->_key = 'file';
        $run = $upload->run();
        if ($run != FALSE) {
            $infoImg = Img::getAttributes($run['dir'] . $run['filename']);
            //exit(print_r($infoImg));
            if ($infoImg[0] != 900) {
                $error[] = 'Excede la Anchura Maxima';
            }
            if ($infoImg[1] != 450) {
                $error[] = 'Excede la Altura Maxima';
            }
            if ($infoImg['filesize'] > 200000) {
                $error[] = 'Excede el Peso Maximo';
            }
            if (isset($error)) {
            //print count($error);
            //exit(print_r($error));
                $result['error'] = $error;
                return $result;
            } else {
                //exit('se guarda');
                return $this->model->saveImage($run['filename']);
            }
        } else {
            $data['messageAction'] = 'No se pudo guardar la imagen.';
            print "<script>parent.resultSubmitImages(" . json_encode($data) . "); </script>";
        }
    }

    public function edit($id) {
        $this->view->ad = $this->model->singleSearch($id);
        $this->view->formAction = DOMAIN . 'coveradmanager/create/';
        $this->view->display = 'inline';
        $this->view->singleList = $this->model->singleList();
        $this->view->action = 'edit';
        $this->view->id = $id;
        $this->view->render('coveradmanager/coveradform', true);
    }

    public function disable($id) {
        $this->model->disable($id);
    }

    public function enable($id) {
        $this->model->enable($id);
    }

}

?>
