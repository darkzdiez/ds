<?php
/*
 * Controlador ComisionContratacion V1
 */

/**
 * Controlador para ComisionContratacion
 *
 * @author sistemas01
 */
class Comisioncontratacion extends Controller {

    public function index() {
        $_POST['TITLE_WEBSITE'] = 'Comisión de Contrataciones en ' . TITLE_WEBSITE;
        $this->view->listado=$this->model->singleList();
        $this->view->render('comisioncontratacion/index');
    }
    public function more() {
        $_POST['TITLE_WEBSITE'] = 'Comisión de Contrataciones en ' . TITLE_WEBSITE;
        $this->view->render('comisioncontratacion/more');
    }
    public function modulePrintLast(){
    	$result=$this->model->searchLast();
    	$data['titulo']=$result[0]['titulo'];
    	$data['denominacion']=$result[0]['denominacion'];
        $this->view->data=$data;
    	print $this->view->getContent('comisioncontratacion/modulePrintLast');
    }

}

?>