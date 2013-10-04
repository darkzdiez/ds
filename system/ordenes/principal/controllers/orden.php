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

class orden extends Controller {

    function __construct(){
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            $this->view->redirect='orden';
            $this->view->render('login/index');
            exit();
        }
        $this->view->js = array('orden/js/default.js');
        $this->view->bc = array('Ordenes' => 'orden');
    }

    public function index($trash = NULL) {
        $this->view->render('orden/index');
    }
    public function generarpdfsave(){
        Session::set('TempPDF',$_POST);
        print json_encode(array('mensaje' => 'informacion enviada'));
    }
    public function generarpdf(){
        /*print_r(Session::get('TempPDF'));
        $result=$this->model->singleSearch($id);
        $this->view->var=$result[0];*/
        if (Session::get('role') == 1 or Session::get('role') == 2) {
            $result=$this->model->selectOrdenes(Session::get('TempPDF'), FALSE);
            $this->view->result=$result;
            $data['location'] = 'orden/pdf';
            $data['autor'] = 'Gobernacion del Estado Yaracuy';
            $data['title'] = 'REPORTE DE ORDENES';
            $data['subject'] = 'DIRECCION DE INFORMATICA DE LA GOBERNACIÓN DEL ESTADO YARACUY';
            $data['keywords'] = 'REPORTE, ORDENES, FILTRO';
            $data['output'] = 'REPORTE.pdf';
            @$this->view->genPDF($data,'TemplateOrdenes','L');
            //$this->view->render('orden/pdf', TRUE);
        }else{
            $this->view->render('error/index');
        }
    }
    public function pdfcantidades(){
        if (Session::get('role') == 1 or Session::get('role') == 2) {
            $result=$this->model->selectOrdenes(Session::get('TempPDF'), FALSE);
            $this->view->data=$this->model->cantidadordenes();
            $data['location'] = 'orden/pdfcantidades';
            $data['autor'] = 'Gobernacion del Estado Yaracuy';
            $data['title'] = 'REPORTE DE ORDENES';
            $data['subject'] = 'DIRECCION DE INFORMATICA DE LA GOBERNACIÓN DEL ESTADO YARACUY';
            $data['keywords'] = 'REPORTE, ORDENES, FILTRO';
            $data['output'] = 'REPORTE.pdf';
            $this->view->genPDF($data,'TemplateOrdenes','L');
            //$this->view->render('orden/pdf', TRUE);
        }else{
            $this->view->render('error/index');
        }
        /*$this->view->data=$this->model->cantidadordenes();
        $this->view->render('orden/pdfcantidades',true);*/
    }
    public function admin($trash = NULL) {
        $this->view->render('orden/index');
    }
    public function ver($trash = NULL) {
        $this->view->render('orden/usuario');
    }
    public function crear($trash = NULL) {
        $this->view->bc=array_merge($this->view->bc, array('Crear' => 'crear'));
        if (Session::get('role') == 1 or Session::get('role') == 2) {
            $this->view->render('orden/crear');
        }else{
            $this->view->render('error/index');
        }
    }
    
    function guardarorden(){
       $data=$this->model->guardarOrden($_POST);
       echo json_encode($data);
    }


    public function selectOrdenes(){
        $data=$this->model->selectOrdenes($_POST);
        if ($data){
            foreach ($data['d'] as $key => &$value) {
                $value['p']=Session::get('role');
            }
            echo json_encode($data);
        }else{
            echo json_encode(array('mensaje'=>'No Hay Datos Para Mostrar'));
        }
    }
    public function cantidadordenes(){
        print json_encode($this->model->cantidadordenes());
    }
    function cargar_responsable(){
        $html="";
        $array = $this->model->selectResponsables();
        $datos=array();
        $html.= "<option>Seleccione</option>";
        foreach ($array as $key => $value) {
            //$html.= "<option value='".$value['id_usuario']."'>".utf8_encode($value['nombres'])."</option>";
            $datos[$value['iduser']]=strtoupper($value['nombres']." | ".$value['nombre']);
        }
        echo json_encode($datos);
    }
    function observacion($id){
        $this->view->bc=array_merge($this->view->bc, array('Observación' => 'orden/observacion'));
        $this->view->idOrden = $id;
        $this->view->datosOrden = $this->model->buscarOrden($id);
        $this->view->render('orden/observacion');
    }
    function observacioncrear($id){
        $this->view->bc=array_merge($this->view->bc, array('Observación' => 'orden/observacion/' . $id, 'Crear observacion' => 'orden/observacioncrear/'));
        if (Session::get('role') == 1 or Session::get('role') == 2) {
            $this->view->idOrden = $id;
            $this->view->datosOrden = $this->model->buscarOrden($id);
            $this->view->render('orden/observacion_crear');
        }else{
            $this->view->render('error/index');
        }
    }
    function observacionguardar($id){
        print json_encode($this->model->observacionguardar($id, $_POST));
    }
    function observacionlistar($id){
        $data = $this->model->observacionlistar($id);
        foreach ($data as $key => &$value) {
            $value['idorden']=$id;
        }
        print json_encode($data);
    }

    function upload($carpeta,$id){
        $upload_handler = new UploadHandler(
            array(
                'script_url' => PATH_NAV.'orden/upload/',
                'upload_dir' => PATH_ORDENES.'/media/'.$carpeta.'/'.$id.'/',
                'upload_url' => PATH_SYSTEM.'media/'.$carpeta.'/'.$id.'/'/*,
                'delete_type' => 'POST'*/
            )
        );
    }

    function detalleobservacion($id,$id_observacion){
        $this->view->bc=array_merge($this->view->bc, array('Observación' => 'orden/observacion/' . $id, 'Detalle Observación' => 'orden/detalleobservacion/'));
        $this->view->id_observacion=$this->model->observacionindividual($id_observacion);
        $this->view->ruta=PATH_NAV.'orden/upload/observacion/'.$id_observacion;
        $this->view->render('orden/observacion_detalles');
    }

    function detallenovedad($id,$id_novedad){
        $this->view->bc=array_merge($this->view->bc, array('Novedad' => 'orden/novedad/' . $id, 'Detalle Novedad' => 'orden/detallenovedad/'));
        $this->view->novedad=$this->model->novedadindividual($id_novedad);
        $this->view->ruta=PATH_NAV.'orden/upload/novedad/'.$id_novedad;
        $this->view->render('orden/novedad_detalles');
    }

    function detallesupervision($id,$id_supervision){
        $this->view->bc=array_merge($this->view->bc, array('Supervisión' => 'orden/supervision/' . $id, 'Detalle Supervisión' => 'orden/detallesupervision/'));
        $this->view->supervision=$this->model->supervisionindividual($id_supervision);
        $this->view->ruta=PATH_NAV.'orden/upload/supervision/'.$id_supervision;
        $this->view->render('orden/supervision_detalles');
    }


    function novedad($id){
        $this->view->bc=array_merge($this->view->bc, array('Novedad' => 'orden/novedad'));
        $this->view->idOrden = $id;
        $this->view->datosOrden = $this->model->buscarOrden($id);
        $this->view->render('orden/novedad');
    }
    function novedadcrear($id){
        $this->view->bc=array_merge($this->view->bc, array('Novedad' => 'orden/novedad/' . $id, 'Crear Novedad' => 'orden/novedadcrear/'));
        $this->view->idOrden = $id;
        $this->view->datosOrden = $this->model->buscarOrden($id);
        if (Session::get('role') == 3 OR $this->view->datosOrden[0]['iduser']==Session::get('iduser')) {
            $this->view->render('orden/novedad_crear');
        }else{
            $this->view->render('error/index');
        }
    }
    function novedadguardar($id){
        print json_encode($this->model->novedadguardar($id, $_POST));
    }

    function novedadlistar($id){
        $data = $this->model->novedadlistar($id);
        foreach ($data as $key => &$value) {
            $value['idorden']=$id;
        }
        print json_encode($data);
    }

    function supervision($id){
        $this->view->bc=array_merge($this->view->bc, array('Supervisión' => 'orden/supervision'));
        if (Session::get('role') == 1 or Session::get('role') == 2) {
            $this->view->idOrden = $id;
            $this->view->datosOrden = $this->model->buscarOrden($id);
            $this->view->render('orden/supervision');
        }else{
            $this->view->render('error/index');
        }
    }
    function supervisioncrear($id){
        $this->view->bc=array_merge($this->view->bc, array('Supervisión' => 'orden/supervision/' . $id, 'Crear Supervisión' => 'orden/supervisioncrear/'));
        if (Session::get('role') == 1 or Session::get('role') == 2) {
            $this->view->idOrden = $id;
            $this->view->datosOrden = $this->model->buscarOrden($id);
            $this->view->render('orden/supervision_crear');
        }else{
            $this->view->render('error/index');
        }
    }
    function supervisionguardar($id){
        print json_encode($this->model->supervisionguardar($id, $_POST));
    }
    function supervisionlistar($id){
        $data = $this->model->supervisionlistar($id);
        foreach ($data as $key => &$value) {
            $value['idorden']=$id;
        }
        print json_encode($data);
    }
    function cambiarestatus(){
        print json_encode($this->model->cambiarestatus($_POST['id_orden'],$_POST['estatus']));
    }
}
?>