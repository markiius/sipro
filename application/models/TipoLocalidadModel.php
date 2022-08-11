<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class TipoLocalidadModel extends CI_Model {

    

    public function getAllTipoLocalidad(){
        $this->db->select('*');
        $this->db->from('tipo_localidad');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return null;
        }
    }

}

/* End of file TipoLocalidadModel.php */
