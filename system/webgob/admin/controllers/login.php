<?php

class Login extends base_login {

    function __construct() {
        parent::__construct();
        $this->view->js = array('login/js/default.js');
    }

}