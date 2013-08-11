<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of other_controller
 *
 * @author sistemas01
 */
class OtherController extends Controller {

    public function index() {
        $this->view->render('index/index.php');
    }

    public function comision_de_contrataciones() {
        include 'smc/models/article_model.php';
        $_POST['parameter'] = '29';
        $this->view->render('other/index.php');
    }

}

?>
