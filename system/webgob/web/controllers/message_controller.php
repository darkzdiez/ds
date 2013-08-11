<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of message_controller
 *
 * @author sistemas01
 */
class MessageController extends Controller {

    public function index() {
        
    }

    public function add() {
        $date = date("Y-m-d H:i:s");
        if ($_POST['name']) {
            print Avisos::success('Mensaje enviado exitosamente');
        } else {
            print Avisos::error('Su mensaje no a podido ser enviado');
        }
    }

}

?>
