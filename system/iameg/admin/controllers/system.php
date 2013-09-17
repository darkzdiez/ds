<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of system
 *
 * @author darkzdiez
 */
class system extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
    }

    public function panelHide() {
        session::set('panel', 'hide');
    }

    public function panelShow() {
        session::set('panel', 'show');
    }

}

?>
