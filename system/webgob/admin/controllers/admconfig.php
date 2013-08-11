<?php

/**
 * Description of client
 *
 * @author darkzdiez
 */
class admConfig extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit;
        }
        $this->view->js = array('config/js/default.js');
    }

    public function index() {
        $this->view->infoModule = 'Aqui puedes cambiar la configuracion del sistema';
        $this->view->render('admconfig/index');
    }

}

?>