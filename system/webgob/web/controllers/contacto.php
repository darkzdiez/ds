<?php

class Contacto extends Controller {

    public function index() {
        $_POST['TITLE_WEBSITE'] = 'Contactanos en ' . TITLE_WEBSITE;
        $this->view->render('contacto/index');
    }
    

}

?>