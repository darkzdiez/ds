<?php

class base_soporte_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function enviarmensaje($data){
        $datos=array(
            'responsable'   => $data['responsable'],
            'asunto'        => $data['asunto'],
            'descripcion'   => $data['descripcion'],
            'grado'         => $data['grado']
            );
        if ($this->db->insert('soporte', $datos)) {
            return array('guardo' => TRUE, "mensaje" => "El Mensaje se a recibido exitosamente", 'fn' => 'soporteGuardado');
        }
        else {
            return array('guardo' => FALSE, "mensaje" => 'Los Mensaje no se ha enviado', 'fn' => 'soporteGuardado');
        }

    }

}