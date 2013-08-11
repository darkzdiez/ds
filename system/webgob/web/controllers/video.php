<?php
/*
 * Controlador Video V1
 */

/**
 * Controlador para Video
 *
 * @author sistemas01
 */
class Video extends Controller {

    public function index() {

    }
    public function more() {
    }
    public function moduleLastYoutube(){
    	$result=$this->model->searchLast();
    	$data['titulo']=$result[0]['titulo'];
    	$data['denominacion']=$result[0]['denominacion'];
        $this->view->data=$data;
    	print $this->view->getContent('video/moduleLastYoutube');
    }
    public function moduleDualYoutubeHome(){
    	$result=$this->model->searchLast();
    	$data['titulo']=$result[0]['titulo'];
    	$data['denominacion']=$result[0]['denominacion'];
        $this->view->data=$data;
    	print $this->view->getContent('video/moduleDualYoutubeHome');
    }

}

?>