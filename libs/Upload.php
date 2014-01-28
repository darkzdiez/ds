<?php

/* Conjunto de Scripts
 * Copyright (c) 2013 - Alfonzo Diez (+58 416 753 1889 - alfonzodiez@gmail.com)
 * http://www.diezsoluciones.com/
 * Utilizando en la librería Upload
 * Created on : 10/01/2013 02:40:08 PM
 * Author     : alfonzo
 * Revision   : 01
 * La reproducción, utilización, venta y copia no autorizada de alguno de los scripts en este archivo esta prohibida totalmente.
 * The reproduction, use, sell unauthorized copies of any of the scripts in this file is prohibited entirely.
 */

/*
 * Description:
 * 
 */

class Upload {

    /**
     * Directorio
     * @author DiezSoluciones.com
     * @version 1.0
     * @param string $_dir
     * @example Indica la ruta donde se guardara el archivo
     * $object->_dir('file/folder/destination');
     */
    public $_dir;

    /**
     * Nombre de Archivo
     * @author DiezSoluciones.com
     * @version 1.0
     * @param string $_fileName
     * @example Indica el nombre del Archivo destino, por defecto se toma $_FILES[$key]['name']
     * $object->_fileName('img.png');
     */
    public $_fileName = NULL;

    /**
     * Nombre Clave
     * @author DiezSoluciones.com
     * @version 1.0
     * @param string $_key
     * @example Indica el nombre clave del metodo file
     * $object->$_key('file'); es igual a $_FILES['file']
     */
    public $_key;
    
    /**
     * Convertir Imagen a algun formato
     * @author DiezSoluciones.com
     * @version 1.0
     * @example Definir la extencion de salida
     * $object->_convertImage();
     */    
    public $_convertImage;

    /**
     * Ejecutar
     * @author DiezSoluciones.com
     * @version 1.0
     * @example Ejecuta la funcion
     * $object->run();
     * @return string Retorna TRUE en caso de Exito o FALSE en caso de Error.
     */    
    public function run() {
        if ($this->_fileName == NULL) {
            $this->_fileName = Text::CleanNameFile($_FILES[$this->_key]['name']);
        }
        if (copy($_FILES[$this->_key]['tmp_name'], $this->_dir . $this->_fileName)) {
            if ($this->_convertImage=='png') {
                Img::convertirPNG($this->_dir . $this->_fileName, true);
                $array = array('dir' => $this->_dir, 'filename' => DS::nameToPNG($this->_fileName));
            }else{
                $array = array('dir' => $this->_dir, 'filename' => $this->_fileName);
            }
            return $array;
        } else {
            return FALSE;
        }
    }
}

?>
