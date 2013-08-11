<?php

class Informacion extends Controller {

    public function index() {
        $this->view->render('informacion/gobernacion');
    }
    public function secretarias() {
        $this->view->render('informacion/secretarias');
    }
    public function more() {
        include 'smc/models/article_model.php';
        $extract = explode('-', URLVariablesClass::get('more'));
        $_POST['more'] = $extract[0];
        $results = ArticleModel::search($extract[0], CATEGORY);
        $_POST['category'] = database::convert_query_in_array($results['result']);
        $results = ArticleModel::search($extract[0], FILE);
        $_POST['file'] = database::convert_query_in_array($results['result']);
        require 'comment_controller.php';
        unset($extract[0]);
        $title = implode(' ', $extract);
        $_POST['TITLE_WEBSITE'] = $title . ' - ' . TITLE_WEBSITE;
        $this->view->render('more_article/index.php');
    }
    public function yaracuy($lugar){
        switch ($lugar) {
            case 'simbolos':
                $this->view->title = 'Yaracuy Simbolos - Información';
                $this->view->render('informacion/yaracuy/simbolos');
                break;
            case 'turismo':
                $this->view->title = 'Yaracuy Turismo - Información';
                $this->view->render('informacion/yaracuy/turismo');
                break;
            case 'faunayflora':
                $this->view->title = 'Yaracuy Flora y Fauna - Información';
                $this->view->render('informacion/yaracuy/faunayflora');
                break;
            case 'historia':
                $this->view->title = 'Yaracuy Flora y Fauna - Información';
                $this->view->render('informacion/yaracuy/historia');
                break;
            default:

                break;
        }
    }
    public function gobernacion($lugar){
        switch ($lugar) {
            case 'visionymision':
                $this->view->title = 'Gobernación Visión y Misión - Información';
                $this->view->render('informacion/gobernacion/visionymision');
                break;
            case 'organigrama':
                $this->view->title = 'Gobernación Organigrama - Información';
                $this->view->render('informacion/gobernacion/organigrama');
                break;
            case 'secretarias':
                $this->view->title = 'Gobernación Secretatias - Información';
                $this->view->render('informacion/gobernacion/secretarias');
                break;
            case 'institutos':
                $this->view->title = 'Gobernación Institutos Descentralizados - Información';
                $this->view->render('informacion/gobernacion/institutos');
                break;
            default:

                break;
        }
    }
}

?>