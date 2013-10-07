<?php

class galeria_Model extends Model {
    
    public function singleList() {
        return $this->db->select('SELECT * FROM `directorio_grupo`');
    }

    public function listarGaleria() {
        return $this->db->select('SELECT * FROM `gallery` ORDER BY `gallery`.`idgallery`  DESC');
    }

    public function creargrupo($data) {
    	$datai['nombre']=$data['nombre'];
    	$datai['status']='1';
        if($this->db->insert('directorio_grupo',$datai)){
        	$mensaje = array('fn' => 'creargrupo', 'mensaje' => 'Se a Agregado Correctamente el grupo con nombre: ' . $datai['nombre']);
        }else{
        	$mensaje = array('fn' => 'creargrupo', 'mensaje' => 'Se ha producido un error al crear el grupo con nombre: ' . $datai['nombre']);
        }
        return $mensaje;
    }

}