<?php



defined('BASEPATH') or exit('No direct script access allowed');

class CriterioAsignacion extends CI_Model
{


    public function getAllCriteriosAsignacion()
    {
        $this->db->select('*');
        $this->db->from('criterios_asignacion');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return null;
        }

    }
}

/* End of file CriterioAsignacion.php */
