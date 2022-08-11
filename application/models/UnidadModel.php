<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class UnidadModel extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getUnidades()
    {
        $this->db->select('*');
        $this->db->from('unidades_responsables UR');
        $this->db->join('municipios M', 'M.id_municipio = UR.id_municipio');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function getUnidadesPorMunicipio($id_municipio)
    {
        $this->db->select('*');
        $this->db->from('unidades_responsables UR');
        $this->db->join('municipios M', 'M.id_municipio = UR.id_municipio');
        $this->db->where('M.id_municipio', $id_municipio);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function getUnidadUpdate($idUnidad)
    {
        $this->db->select('*');
        $this->db->from('unidades_responsables UR');
        $this->db->join('municipios M', 'M.id_municipio = UR.id_municipio');
        $this->db->where('id_unidad_responsable', $idUnidad);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function getUnidadMunicipio($idMunicipio)
    {
        $this->db->select('*');
        $this->db->from('unidades_responsables UR');
        $this->db->join('usuarios U', 'U.id_unidad_responsable = UR.id_unidad_responsable');
        $this->db->where('UR.id_municipio', $idMunicipio);
        $this->db->order_by("UR.nombre_unidad", "asc");
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function getUnidadMunicipioRegistro($idMunicipio)
    {
        $this->db->select('*');
        $this->db->from('unidades_responsables UR');
        //$this->db->join('usuarios U', 'U.id_unidad_responsable = UR.id_unidad_responsable');
        $this->db->where('UR.id_municipio', $idMunicipio);
        $this->db->order_by("UR.nombre_unidad", "asc");
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    
    public function insertUnidad($nombreUnidad, $municipio){
        $data = array(
            "nombre_unidad" => $nombreUnidad,
            "id_municipio" => $municipio
        );

        $this->db->insert('unidades_responsables', $data);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->error();
        }
    }

    public function deleteUnidad($idUnidad){
        $this->db->where('id_unidad_responsable', $idUnidad);
        $this->db->delete('unidades_responsables');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function updateUnidad($idUnidad, $nombreUnidad){
        $data = array(
            "nombre_unidad" => $nombreUnidad
        );

        $this->db->set($data);
        $this->db->where('id_unidad_responsable', $idUnidad);
        $this->db->update('unidades_responsables');
        
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}

/* End of file usuarioModel.php */
