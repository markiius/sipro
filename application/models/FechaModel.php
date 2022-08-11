<?php



defined('BASEPATH') or exit('No direct script access allowed');

class FechaModel extends CI_Model
{

    public function createFecha($campo, $id_actividad)
    {
        $mes = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
        $cont = 0;
        foreach ($campo as $key) {
            $data = array(
                "mes" => $mes[$cont],
                "cantidad_programada" => $key,
                "id_actividad" => $id_actividad
            );
            $cont++;
            $this->db->insert("actividades_fechas", $data);
        }
    }

    public function getAllMeses($id_actividad)
    {
        $this->db->select('*');
        $this->db->from('actividades_fechas');
        $this->db->where('id_actividad', $id_actividad);
        $query = $this->db->get();
        return $query->result();
    }

    public function setEvidencia($id_actividad_fecha, $evidencia)
    {
        $data = array(
            "ruta" => $evidencia,
            "id_actividad_fecha" => $id_actividad_fecha
        );
        $this->db->insert("evidencias", $data);

        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return $this->db->error();
        }
    }

    public function getEvidencia($id_actividad_fecha)
    {
        $this->db->select('*');
        $this->db->from('evidencias');
        $this->db->where('id_actividad_fecha', $id_actividad_fecha);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }


    public function getOneFecha($id_actividad_fecha)
    {
        $this->db->select('*');
        $this->db->from('actividades_fechas');
        $this->db->where('id_actividad_fecha', $id_actividad_fecha);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function updateFecha($id_actividad_fecha, $cantidad_programada)
    {
        $data = array(
            "cantidad_programada" => $cantidad_programada
        );
        $this->db->set($data);
        $this->db->where('id_actividad_fecha', $id_actividad_fecha);
        $this->db->update('actividades_fechas');

        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}

/* End of file FechaModel.php */
