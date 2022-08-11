<?php


defined('BASEPATH') or exit('No direct script access allowed');

class ComponenteModel extends CI_Model
{

    public function CreateComponente($numero_componente, $nombre_componente, $id_programa)
    {
        $data = array(
            "numero_componente" => $numero_componente,
            "nombre_componente" => $nombre_componente,
            "id_programa" => $id_programa
        );
        $this->db->insert("componentes", $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return $this->db->error();
        }
    }
    /* OBTENER TODOS LOS COMPONENTES POR PROGRAMA */
    public function getAllComponentes($id_programa)
    {
        $this->db->select('*');
        $this->db->from('componentes');
        $this->db->where('id_programa', $id_programa);
        $query = $this->db->get();

        return $query->result();
    }
    /* OBTENER UN COMPONENTE PARA ASIGNAR ACTIVIDADES */
    public function getOneComponenteActividad($id_componente)
    {
        $this->db->select('*');
        $this->db->from('componentes');
        $this->db->where('id_componente', $id_componente);
        $query = $this->db->get();

        return $query->result();
    }

    public function getOneComponente($id_componente)
    {
        $this->db->select('*');
        $this->db->from('componentes');
        $this->db->where('id_componente', $id_componente);
        $query = $this->db->get();

        return $query->row();
    }

    public function updateComponente($id_componente, $numero_componente, $nombre_componente)
    {
        $data = array(
            "id_componente"   => $id_componente,
            "numero_componente" => $numero_componente,
            "nombre_componente"  => $nombre_componente
        );
        $this->db->set($data);
        $this->db->where('id_componente', $id_componente);
        $this->db->update('componentes');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteComponente($id_componente)
    {
        $this->db->where('id_componente', $id_componente);
        $this->db->delete('componentes');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

/* End of file ComponenteModel.php */
