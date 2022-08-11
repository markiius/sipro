<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class MunicipioModel extends CI_Model {

    public function __construct()
    {
        parent:: __construct();
    }

    public function getAllMunicipio()
    {
        $id = $this->session->userdata('usuario');
        $this->db->select('*');
        $this->db->from('usuarios_municipios um');
        $this->db->join('municipios m', 'm.id_municipio = um.id_municipio');
        $this->db->where('um.id_usuario', $id);
        $query = $this->db->get();

        return $query->result();

    }

    public function getOneMunicipio($id)
    {
        
        $this->db->select('*');
        $this->db->from('municipios');
        $this->db->where('id_municipio', $id);
        $query = $this->db->get();

        return $query->result();

    }

    public function getMunicipio()
    {
        $id_municipio = $this->session->userdata('municipio');
        $this->db->select('*');
        $this->db->from('municipios');
        $this->db->where('id_municipio', $id_municipio);
        $query = $this->db->get();
        return $query->result();

    }

    public function getAllMunicipios()
    {
        $id = $this->session->userdata('usuario');
        $this->db->select('*');
        $this->db->from('municipios');
        //$this->db->join('municipios m', 'm.id_municipio = um.id_municipio');
        //$this->db->where('um.id_usuario', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getMun($id_municipio){
        $this->db->select('*');
        $this->db->from('municipios');
        $this->db->where('id_municipio', $id_municipio);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }



    

    
}

/* End of file municipioModel.php */
