<?php

//============================================================+
// File name   : spa.php
// Begin       : 2004-03-03
// Last Update : 2010-10-26
//
// Description : Language module for TCPDF
//               (contains translated texts)
//               Spanish; Castilian
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               Manor Coach House, Church Hill
//               Aldershot, Hants, GU12 4RQ
//               UK
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * TCPDF language file (contains translated texts).
 * @package com.tecnick.tcpdf
 * @brief TCPDF language file: Spanish; Castilian
 * @author Nicola Asuni
 * @since 2004-03-03
 */
// Spanish; Castilian

global $TCPDFLang;
$TCPDFLang = Array();

// PAGE META DESCRIPTORS --------------------------------------

$TCPDFLang['a_meta_charset'] = 'UTF-8';
$TCPDFLang['a_meta_dir'] = 'ltr';
$TCPDFLang['a_meta_language'] = 'es';

// TRANSLATIONS --------------------------------------
$TCPDFLang['w_page'] = 'página';

class TcpdfLang {

    public static function get() {
        $TCPDFLang = Array();

// PAGE META DESCRIPTORS --------------------------------------

        $TCPDFLang['a_meta_charset'] = 'UTF-8';
        $TCPDFLang['a_meta_dir'] = 'ltr';
        $TCPDFLang['a_meta_language'] = 'es';

// TRANSLATIONS --------------------------------------
        $TCPDFLang['w_page'] = 'página';
        return $TCPDFLang;
    }

}

//============================================================+
// END OF FILE
//============================================================+