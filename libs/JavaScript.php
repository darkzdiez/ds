<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JavaScript
 *
 * @author darkzdiez
 */
class JavaScript {

    public function arrayToArrayJS($array, $name) {
        end($array);
        $end = key($array);
        reset($array);
        $result = $name . '=[';
        for ($i = 1; $i <= $end; $i++) {
            if (array_key_exists($i, $array)) {
                $result = $result . $array[$i];
            }
            if ($i != $end) {
                $result.=',';
            } else {
                $result.='];';
            }
        }
        return $result;
    }

}

?>
