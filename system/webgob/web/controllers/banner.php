<?php
class Banner extends Controller {

    public function index() {
    }
    public function b282x236(){
		$this->view->imagenes=scandir('system/webgob/media/images/banner/1');
		print $this->view->getContent('banner/b282x236');
    }

}

?>