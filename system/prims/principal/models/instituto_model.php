<?php

class Instituto_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function ListarInstitutos(){
        return $this->db->select('SELECT * FROM `institutos`');
    }
    
    public function institutoSingleList($id)
    {
        return $this->db->select('SELECT id,nombre FROM institutos WHERE id = :id', array(':id' => $id));
    }
    
    public function create($data)
    {
       if ($this->db->insert('institutos', $data)) {
            return array('guardo' => TRUE, "mensaje" => 'Los Datos se han guardado exitosamente', 'fn' => 'guardarinstituto');
        }
        else {
            // if($this->db->_ERROR[1]==1062){
            //     return array('guardo' => FALSE, "mensaje" => 'El Nombre de Usuario: '.$data['login'].', ya esta en uso', 'fn' => 'guardaruser');
            // }else{
                return array('guardo' => FALSE, "mensaje" => 'Los Datos no se han guardado', 'fn' => 'guardarinstituto');
            // }
        }
    }
    
    public function editSave($data)
    {
        $postData = array(
            'nombre' => $data['nombre']
        );

        if($this->db->update('institutos', $postData, "id =".$data['id'])){
            return array('guardo' => TRUE, "mensaje" => 'Los Datos se han modificado exitosamente', 'fn' => 'guardarinstituto');
        }
    }
    
    public function delete($id)
    {
      
        $this->db->delete('institutos', "id = '$id'");
    }

}