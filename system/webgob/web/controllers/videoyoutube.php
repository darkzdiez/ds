<?php

class Videoyoutube extends Controller {

    public function index() {
    }
    public function printlast(){
    	$result=$this->model->searchLast();
    	@$data['idyoutube']=$result[0]['idyoutube'];
        @$this->view->data=$data;
    	@print $this->view->getContent('videoyoutube/printlast');
    }

}

?>