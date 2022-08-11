<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class LocalidadModel extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getAllForMunicipio($id_municipio){
        $this->db->select('*');
        $this->db->from('localidades');
        $this->db->where('id_municipio', $id_municipio);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return null;
        }
    }

}

/* End of file LocalidadModel.php */
