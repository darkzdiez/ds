<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sendSMS
 *
 * @author alfonzo
 */
class sendSMS {
    public function run($num,$msj) {
        $salida = shell_exec("echo 1234 | sudo -S gammu sendsms TEXT $num -text '$msj'");
        return "echo 1234 | sudo -S gammu sendsms TEXT $num -text '$msj'";
    }
}
?>
