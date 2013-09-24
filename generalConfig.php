<?php

// Definir configuracion general
define('LIBS', 'libs/');
define('_pathSYSTEM', 'system/');
define('PROJECTNAME', 'webt');
define('SYSTEMDEFAULT','webgob');
$listSYSTEM = array(
    #'prueba' => array('webgob', 'ordenes'),
    'prueba' => 'ordenes',
    /*'yaracuy.gob.ve' => array('webgob', 'ordenes'),
    'www.yaracuy.gob.ve' => array('webgob', 'ordenes'),*/
    'primasalud.com.ve' => 'prims',
    'www.primasalud.com.ve' => 'prims',
    'iameg.org.ve' => 'iameg',
    'www.iameg.org.ve' => 'iameg',
    'diezsoluciones.com' => 'diezs',
    'www.diezsoluciones.com' => 'diezs'
);
$RewriteBase = array(
    'primasalud.com.ve' => '',
    'www.primasalud.com.ve' => '',
    'iameg.org.ve' => '',
    'www.iameg.org.ve' => '',
    'diezsoluciones.com' => 'w',
    'www.diezsoluciones.com' => 'w'
);
