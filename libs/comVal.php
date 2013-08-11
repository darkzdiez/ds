<?php

class comVal {

    public static function emptyPrint($param, $text) {
        if (!empty($param)) {
            return $param;
        } else {
            return $text;
        }
    }

}
