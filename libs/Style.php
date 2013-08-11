<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Style
 *
 * @author darkzdiez
 */
class Style {

    private $_tableTrCount = 1;

    public function tableTr() {
        if ($this->_tableTrCount % 2) {
            print 'alt';
        }
        $this->_tableTrCount++;
    }

    public function tableTrReset() {
        $this->_tableTrCount = 1;
    }

}

?>
