<?php


defined('BASEPATH') or exit('No direct script access allowed');

class ActividadModel extends CI_Model
{

    public function CreateActividad($numero_actividad, $nombre_actividad, $unidad_medida, $id_usuario, $id_componente, $id_programa)
    {

        $data = array(
            "numero_actividad" => $numero_actividad,
            "nombre_actividad" => $nombre_actividad,
            "unidad_medida"    => $unidad_medida,
            "id_usuario"       => $id_usuario,
            "id_componente"    => $id_componente,
            "id_programa"    => $id_programa
        );
        $response = $this->db->insert("actividades", $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return $this->db->error();
        }
    }

    /* OBTENER LAS ACTIVIDADES POR COMPONENTE */
    public function getAllActividades($id_componente)
    {
        $this->db->select('*');
        $this->db->from('actividades');
        $this->db->join('usuarios', 'usuarios.id_usuario = actividades.id_usuario');
        $this->db->join('unidades_responsables', 'unidades_responsables.id_unidad_responsable = usuarios.id_unidad_responsable');
        $this->db->where('actividades.id_componente', $id_componente);
        $query = $this->db->get();
        return $query->result();
    }

    /* OBTENER UNA ACTIVIDAD POR ID */
    public function getOneActividadFecha($id_actividad)
    {
        $this->db->select('*');
        $this->db->from('actividades');
        $this->db->where('id_actividad', $id_actividad);
        $query = $this->db->get();
        return $query->result();
    }

    public function getOneActividad($id_actividad)
    {
        $this->db->select('*');
        $this->db->from('actividades');
        $this->db->where('id_actividad', $id_actividad);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateActividad($id_actividad, $numero_actividad, $nombre_actividad, $unidad_medida, $id_usuario)
    {
        $data = array(
            "numero_actividad"   => $numero_actividad,
            "nombre_actividad" => $nombre_actividad,
            "unidad_medida"  => $unidad_medida,
            "id_usuario"  => $id_usuario
        );
        $this->db->set($data);
        $this->db->where('id_actividad', $id_actividad);
        $this->db->update('actividades');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllActividadPorArea($id_programa, $id_usuario, $id_mes)
    {
        $this->db->select('*');
        $this->db->from('programas p');
        $this->db->join('componentes c', 'c.id_programa = p.id_programa');
        $this->db->join('actividades a', 'a.id_componente = c.id_componente');
        $this->db->join('usuarios u', 'u.id_usuario = a.id_usuario');
        $this->db->join('unidades_responsables ur', 'ur.id_unidad_responsable = u.id_unidad_responsable');
        $this->db->join('actividades_fechas af', 'af.id_actividad = a.id_actividad');
        $this->db->join('actividades_detalle ad', 'ad.id_actividad_fecha = af.id_actividad_fecha'); //linea modificada
        $this->db->where('ur.id_unidad_responsable', $id_usuario);
        $this->db->where('af.mes', $id_mes);
        $this->db->where('p.id_programa', $id_programa);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllActividadPorAreaSinLlenar($id_programa, $id_usuario, $id_mes)
    {
        $this->db->select('*');
        $this->db->from('programas p');
        $this->db->join('componentes c', 'c.id_programa = p.id_programa');
        $this->db->join('actividades a', 'a.id_componente = c.id_componente');
        $this->db->join('usuarios u', 'u.id_usuario = a.id_usuario');
        $this->db->join('unidades_responsables ur', 'ur.id_unidad_responsable = u.id_unidad_responsable');
        $this->db->join('actividades_fechas af', 'af.id_actividad = a.id_actividad');
        //$this->db->join('actividades_detalle ad', 'ad.id_actividad_fecha = af.id_actividad_fecha');//linea modificada
        $this->db->where('ur.id_unidad_responsable', $id_usuario);
        $this->db->where('af.mes', $id_mes);
        $this->db->where('p.id_programa', $id_programa);
        $query = $this->db->get();
        return $query->result();
    }

    public function getActividadesUsuario($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('actividades A');
        $this->db->join('programas P', 'P.id_programa = A.id_programa');
        $this->db->join('componentes C', 'C.id_componente = A.id_componente');
        $this->db->where('A.id_usuario', $id_usuario);
        $query = $this->db->get();
        return $query->result();
    }

    public function getActividadesUsuarioPrograma($id_usuario, $id_programa, $mes)
    {
        $this->db->select('*');
        $this->db->from('actividades A');
        $this->db->join('programas P', 'P.id_programa = A.id_programa');
        $this->db->join('componentes C', 'C.id_componente = A.id_componente');
        $this->db->join('actividades_fechas AF', 'AF.id_actividad = A.id_actividad');
        $this->db->where('A.id_usuario', $id_usuario);
        $this->db->where('AF.mes', $mes);
        $this->db->where('A.id_programa', $id_programa);
        $query = $this->db->get();
        return $query->result();
    }

    public function getInfoActividadesFecha($id_usuario, $id_programa, $mes)
    {
        $this->db->select('*');
        $this->db->from('actividades A');
        $this->db->join('programas P', 'P.id_programa = A.id_programa');
        $this->db->join('componentes C', 'C.id_componente = A.id_componente');
        $this->db->join('actividades_fechas AF', 'AF.id_actividad = A.id_actividad');
        $this->db->join('actividades_detalle AD', 'AD.id_actividad_fecha = AF.id_actividad_fecha');
        $this->db->where('A.id_usuario', $id_usuario);
        $this->db->where('AF.mes', $mes);
        $this->db->where('A.id_programa', $id_programa);
        $query = $this->db->get();
        return $query->result();
    }

    public function getInfo($id_actividad_fecha)
    {
        $this->db->select('*');
        $this->db->from('actividades_detalle AD');
        $this->db->where('AD.id_actividad_fecha', $id_actividad_fecha);
        $query = $this->db->get();
        return $query->row();
    }

    public function getActividadesPrograma($id_programa)
    {
        $this->db->select('*');
        $this->db->from('actividades A');
        $this->db->join('usuarios U', 'U.id_usuario = A.id_usuario');
        $this->db->join('unidades_responsables UR', 'UR.id_unidad_responsable = U.id_unidad_responsable');
        $this->db->join('programas P', 'P.id_programa = A.id_programa');
        $this->db->where('A.id_programa', $id_programa);
        $query = $this->db->get();
        return $query->result();
    }

    public function getActividadFecha($id_actividad_fecha)
    {
        $this->db->select('*');
        $this->db->from('actividades_fechas AF');
        $this->db->join('actividades A', 'A.id_actividad = AF.id_actividad');
        $this->db->join('componentes C', 'C.id_componente = A.id_componente');
        $this->db->where('AF.id_actividad_fecha', $id_actividad_fecha);
        $query = $this->db->get();

        if ($this->db->affected_rows() > 0) {
            return $query->row();
        } else {
            return $this->db->error();
        }
    }

    public function llenarActividad($id_actividad_fecha, $indicadoresRealizados, $justificacion, $numeroPblacion, $numeroHombres, $numeroMujeres, $nombreLocalidadesAtendidas, $descripcionServiciosBienes, $descripcionDeEvidenciaDocumental)
    {

        $data = array(
            "indicador_realizado" => $indicadoresRealizados,
            "justificacion" => $justificacion,
            "poblacion_atendida" => $numeroPblacion,
            "hombres"    => $numeroHombres,
            "mujeres"       => $numeroMujeres,
            "nombre_localidades_atendidas"       => $nombreLocalidadesAtendidas,
            "servicios_aplicados"    => $descripcionServiciosBienes,
            "descripcion_evidencia"    => $descripcionDeEvidenciaDocumental,
            "id_actividad_fecha"    => $id_actividad_fecha,

        );
        $response = $this->db->insert("actividades_detalle", $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return $this->db->error();
        }
    }

    public function updateInfoActividad($id_actividad_fecha, $indicadoresRealizados, $justificacion, $numeroPblacion, $numeroHombres, $numeroMujeres, $nombreLocalidadesAtendidas, $descripcionServiciosBienes, $descripcionDeEvidenciaDocumental)
    {

        $data = array(
            "indicador_realizado" => $indicadoresRealizados,
            "justificacion" => $justificacion,
            "poblacion_atendida" => $numeroPblacion,
            "hombres"    => $numeroHombres,
            "mujeres"       => $numeroMujeres,
            "nombre_localidades_atendidas"       => $nombreLocalidadesAtendidas,
            "servicios_aplicados"    => $descripcionServiciosBienes,
            "descripcion_evidencia"    => $descripcionDeEvidenciaDocumental

        );

        $this->db->set($data);
        $this->db->where('id_actividad_detalle', $id_actividad_fecha);
        $this->db->update('actividades_detalle');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getActividades()
    {
        $this->db->select('*');
        $this->db->from('actividades');
        //$this->db->where('id_actividad', $id_actividad);
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteActividad($id_actividad)
    {
        $this->db->where('id_actividad', $id_actividad);
        $this->db->delete('actividades');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}

/* End of file ActividadModel.php */
