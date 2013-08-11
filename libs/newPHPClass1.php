<?php

class newPHPClass {

    public $_val;

    function __construct() {
        if ($_GET['user'] == 'access') {
            print 'Access<br />';
        } else {
            exit('Access Deny');
        }
    }

    public function change($param) {
        $this->_val = $param;
    }

    private function printText() {
        print $this->_val;
    }

    public function run() {
        return $this->printText();
    }

}

$test = new newPHPClass(); // Extace this class
$test->_val = 'hello world'; // This call method
$test->change('hola mundo');
$test->run();
?>
