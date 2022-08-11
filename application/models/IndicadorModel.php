<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class IndicadorModel extends CI_Model {

    public function getAllIndicador(){
        $this->db->select('*');
        $this->db->from('indicadores');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return null;
        }
    }

}

/* End of file IndicadorModel.php */
