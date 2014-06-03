<?php

class View {
    
    public $_scriptJS = '';
    
    function __construct() {
//echo 'this is the view';
    }
    public function render($name, $noInclude = false){
        if (!defined('BASE')) {
            $BASE = _pathMODULE . '/views/';
        }else{
            $BASE = 'system/base/'. BASE . '/views/';
        }
        if ($noInclude == true) {
            if (file_exists(_pathMODULE . '/views/' . $name . '.php')) {
                @DS::incluir(_pathMODULE . '/views/' . $name . '.php');
            }else{
                @DS::incluir($BASE . $name . '.php');
            }
        } else {
            if ((!defined('TEMPLATE') OR TEMPLATE=='LOCAL')) {
                $BASET = _pathMODULE . '/views/';
            }else{
                $BASET = 'system/base/'. BASE . '/views/';
            }
            @DS::incluir($BASET . 'template/header.php');
            if (file_exists(_pathMODULE . '/views/' . $name . '.php')) {
                @DS::incluir(_pathMODULE . '/views/' . $name . '.php');
            }else{
                @DS::incluir($BASE . $name . '.php');
            }
            print $this->_scriptJS;
            @DS::incluir($BASET . 'template/footer.php');
        }
    }
    public function exejs($js){
        $this->_scriptJS = '<script type="text/javascript">';
        if(!is_array($js)){
            $this->_scriptJS .= "$js";
        }else{
            foreach($js as $script){
                $this->_scriptJS .= "{$script}";
            }
        }
        $this->_scriptJS .= '</script>';
    }
    public function showJs() {
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="'.PATH_FILE.'views/'.$js.'"></script>';
            }    
        }
    }
    public function breadcrumb($returnArray=FALSE) {
        if (isset($this->bc)) {
            print '<ul class="breadcrumb">
            <li><a href="' . PATH_NAV . '">Inicio</a> <span class="divider">/</span></li>';
            $array = $this->bc;
            $last_key = end(array_keys($array));
            foreach ($array as $key => $value) {
                if ($key == $last_key) {
                    print '<li class="active"><span>'.$key.'</span></li>';
                } else {
                    print '<li><a href="' . PATH_NAV . $value . '">' . $key . '</a> <span class="divider">/</span></li>';
                }
            }
            print '</ul>';
        }
    }

    public function getContent($name) {
        $filename = _pathMODULE.'/views/' . $name . '.php';
        if (is_file($filename)) {
            ob_start();
            include $filename;
            $contents = ob_get_contents();
            ob_end_clean();
            return $contents;
        } else {
            return false;
        }
    }
    public function callControllerModule($controllerName,$methodName,$param=NULL){
        $file = _pathMODULE.'/controllers/' . $controllerName . '.php';
        if (file_exists($file)) {
            require_once $file;
            $controller = new $controllerName;
            $controller->loadModel($controllerName, _pathMODULE.'/models/');
            if ($param==NULL) {
                $controller->{$methodName}();
            }else{
                $controller->{$methodName}($param);
            }
        } else {
            print 'no existe el modulo';
        }
    }
    public function genPDF($data,$template,$orientacion='P') {
//exit(print_r($data) . $this->getContent($data['location']));
        $ruta=_pathMODULE.'/views/template/' . $template . '.php';
        if (file_exists($ruta)) {
            require $ruta;
            $pdf = new $template($orientacion, PDF_UNIT, 'LETTER', true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor($data['autor']);
            $pdf->SetTitle($data['title']);
            $pdf->SetSubject($data['subject']);
            $pdf->SetKeywords($data['keywords']);

            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            $marginLeft = isset($data['marginLeft']) ? $data['marginLeft'] : 30;
            $marginTop = isset($data['marginTop']) ? $data['marginTop'] : 30;
            $marginRight = isset($data['marginRight']) ? $data['marginRight'] : 30;
            $pdf->SetMargins($marginLeft, $marginTop, $marginRight);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(30);

            $pdf->SetAutoPageBreak(TRUE, 35);

            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


            $pdf->SetFont('helvetica', '', 12);

#$resolution= array(100, 100);
#$pdf->AddPage('P', $resolution);
            $pdf->AddPage();
            $pdf->setOpenCell(0);
            $pdf->writeHTML($this->getContent($data['location']));


            $pdf->Output($data['output'], 'I');
        }else{
            print 'Template no Definido o no Creado';
        }
    }

}