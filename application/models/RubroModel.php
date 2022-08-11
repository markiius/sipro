<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class RubroModel extends CI_Model {

    
    public function getAllRubros(){
        $this->db->select('*');
        $this->db->from('rubro');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return null;
        }
    }

}

/* End of file RubroModel.php */
