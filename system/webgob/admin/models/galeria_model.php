<?php

class galeria_Model extends Model {
    
    public function singleList() {
        return $this->db->select('SELECT * FROM `directorio_grupo`');
    }

    public function listarGaleria() {
        return $this->db->select('SELECT * FROM `gallery` ORDER BY `gallery`.`idgallery`  DESC');
    }

    public function crear($postdata) {
        $data['name']=$postdata['nombre'];
        if($this->db->insert('gallery',$data)){
            $mensaje = array('fn' => 'crearGaleria', 'mensaje' => 'Se a Agregado Correctamente la galeria con nombre: ' . $data['name']);
        }else{
            $mensaje = array('fn' => 'crearGaleria', 'mensaje' => 'Se ha producido un error al crear la galeria con nombre: ' . $data['name']);
        }
        return $mensaje;
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