<?php

/* Conjunto de Scripts
 * Copyright (c) 2013 - Alfonzo Diez (+58 416 753 1889 - alfonzodiez@gmail.com)
 * http://www.diezsoluciones.com/
 * Utilizando en la librería newjavascript
 * Created on : 09/01/2013 03:54:14 PM
 * Author     : darkzdiez
 * Revision   : 01
 * La reproducción, utilización, venta y copia no autorizada de alguno de los scripts en este archivo esta prohibida totalmente.
 * The reproduction, use, sell unauthorized copies of any of the scripts in this file is prohibited entirely.
 */

/*
 * Description:
 * 
 */

class coverad extends Controller{
    function index() {
        print json_encode($this->model->singleList('0,10'));
    }
}

?>
