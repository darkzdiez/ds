<?php

class Ccomuna extends Controller {

    public function index() {
        $_POST['TITLE_WEBSITE'] = 'Consulta Consejo Cumunal en ' . TITLE_WEBSITE;
        $this->view->render('ccomuna/index');
    }

}

?>