<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This Class Example
 *
 * @author DiezSoluciones.com
 */
class newPHPClass {

    /**
     * @var string  
     */
    public $_val;

    /**
     * Change
     * @author DiezSoluciones.
     * @version 1.0
     * @param string $param
     * @example $object = new newPHPClass;<br />
     * $object->change('text');
     */
    function __construct() {
        if ($_GET['user'] == 'access') {
            print 'Access<br />';
        } else {
            //header('location: /');
            exit('Access Deny');
        }
    }

    public function change($param) {
        $this->_val = $param;
    }

    private function printText() {
        print $this->_val;
    }

    /**
     * Run
     * @return string 
     */
    public function run() {
        return $this->printText();
    }

}

$test = new newPHPClass(); // Extace this class
$test->_val = 'hello world'; // This call method
$test->change('hola mundo');
$test->run();
?>
