<?php
/*
 * Controlador ComisionContratacion V1
 */

/**
 * Controlador para ComisionContratacion
 *
 * @author sistemas01
 */
class rindiencuentasController extends Controller {

    public function index() {
        $_POST['TITLE_WEBSITE'] = 'Rindiendo Cuentas en ' . TITLE_WEBSITE;
        $this->view->render('rindiencuentas/index.php');
    }
}

?>