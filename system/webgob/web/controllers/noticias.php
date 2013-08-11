<?php

class Noticias extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $_POST['TITLE_WEBSITE'] = 'Noticias en ' . TITLE_WEBSITE;
        $this->view->listadoSimple=$this->model->listadoSimple();
        $this->view->render('noticias/index');
    }

    function buscarPorCategoriaJSON($category = 14, $limit = 3) {
        print json_encode($this->model->buscarPorCategoria($category, $limit));
    }

    public function more($ruta) {
        $extract = explode('-', $ruta);
        $this->view->noticia=$this->model->busquedaSimple($extract[0]);
        $images = $this->systemLoadModel('image');
        $this->view->images = $images->singleSearch($extract[0]);
        $this->view->render('more_article/index');
    }

    public function morehome($param = NULL) {

    }

    public function filter() {
        @$from = $_POST['filter_date_article_start'];
        @$to = $_POST['filter_date_article_end'];
        include 'smc/models/article_model.php';
        $_POST['TITLE_WEBSITE'] = 'Noticias en ' . TITLE_WEBSITE;
        $this->view->render('noticias/filter.php');
    }

}

?>