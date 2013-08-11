<?php

/* Conjunto de Scripts
 * Copyright (c) 2013 - Alfonzo Diez (+58 416 753 1889 - alfonzodiez@gmail.com)
 * http://www.diezsoluciones.com/
 * Utilizando en la librería libCaptcha
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

class libCaptcha {

    public $_numChar = 4;
    public $_topTitle = NULL;
    public $_bottomTitle = NULL;
    private $_textRamdom = NULL;

    public function generate() {
        $this->_textRamdom = substr(str_replace("0", "", str_replace("O", "", strtoupper(md5(rand(9999, 99999))))), 0, $this->_numChar);
        return $this->_textRamdom;
    }

    public function run() {
        $ancho = 100;
        $alto = 60;

//Colores
        $image = imagecreatetruecolor($ancho, $alto);
        $negro = imagecolorallocate($image, 0, 0, 0);
        $gray = imagecolorallocate($image, 100, 100, 100);
        $rgb[0] = rand(0, 255);
        $rgb[1] = rand(0, 255);
        $rgb[2] = rand(0, 255);
        $RandomColor = imagecolorallocate($image, $rgb[0], $rgb[1], $rgb[2]);
        $RandomColorInverted = imagecolorallocate($image, 255 - $rgb[0], 255 - $rgb[1], 255 - $rgb[2]);

//Fondo
        imagefill($image, 0, 0, $RandomColor);

//Rejilla
        imageline($image, 25, 0, 25, $alto, $gray);
        imageline($image, 50, 0, 50, $alto, $gray);
        imageline($image, 75, 0, 75, $alto, $gray);
        imageline($image, 0, 13, $ancho, 13, $gray);
        imageline($image, 0, 26, $ancho, 26, $gray);
        imageline($image, 0, 39, $ancho, 39, $gray);
//TextFont
        $ttf = dirname(__DIR__) . "/libs/libCaptcha/font/gunplay rg.ttf";
        //exit($ttf);
        imagefttext($image, 22, rand(-10, 10), 15, 40, $RandomColorInverted, $ttf, $this->_textRamdom);

//Ruido
        for ($i = 0; $i <= 400; $i++) {
            $randx = rand(0, 100);
            $randy = rand(0, 55);
            imagesetpixel($image, $randx, $randy, $RandomColorInverted);
        }
//TextoSimple
        imagestring($image, 2, 2, -2, $this->_topTitle, $negro);
        imagestring($image, 2, 2, 47, $this->_bottomTitle, $negro);
//Marco
        imageline($image, 0, 0, $ancho, 0, $negro);
        imageline($image, 0, 0, 0, $alto, $negro);
        imageline($image, $ancho - 1, $alto - 1, 0, $alto - 1, $negro);
        imageline($image, $ancho - 1, $alto - 1, $ancho - 1, 0, $negro);
//Salida
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
        header("Content-type: image/png");
        imagepng($image);
        imagedestroy($image);
    }

}

?>