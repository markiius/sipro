<?php


defined('BASEPATH') or exit('No direct script access allowed');

class AnaliticoModel extends CI_Model
{

    public function insertAnalitico(
        $ejercicio_fiscal,
        $nombre_entidad,
        $clave_entidad,
        $nombre_municipio,
        $clave_municipio,
        $nombre_localidad,
        $clave_localidad,
        $numero_obra,
        $folio_mids,
        $ubicacion_obra,
        $tipo_localidad,
        $rubro_accion,
        $poblacion_total,
        $poblacion_referencia,
        $poblacion_objetivo,
        $poblacion_atendida,
        $numero_hombres,
        $numero_mujeres,
        $grado_marginacion,
        $criterios_asignacion,
        $indicadores_vivienda,
        $poblacion_carencia,
        $total_poblacion_carencia,
        $monto_obra,
        $fuente_financiamiento,
        $avance_financiero,
        $avance_fisico,
        $geo_localizacion,
        $date,
        $mes,
        $year
    ) {

        $data = array(
            "ejercicio_fiscal" => $ejercicio_fiscal,
            "nombre_entidad" => $nombre_entidad,
            "clave_entidad" => $clave_entidad,
            "id_municipio" => $nombre_municipio,
            "clave_municipio" => $clave_municipio,
            "id_localidad" => $nombre_localidad,
            "clave_localidad" => $clave_localidad,
            "numero_obra" => $numero_obra,
            "folio_mids" => $folio_mids,
            "ubicacion_obra" => $ubicacion_obra,
            "id_tipo_localidad" => $tipo_localidad,
            "id_rubro" => $rubro_accion,
            "poblacion_total" => $poblacion_total,
            "poblacion_referencia" => $poblacion_referencia,
            "poblacion_objetivo" => $poblacion_objetivo,
            "poblacion_atendida" => $poblacion_atendida,
            "hombres" => $numero_hombres,
            "mujeres" => $numero_mujeres,
            "grado_marginacion" => $grado_marginacion,
            "id_criterio" => $criterios_asignacion,
            "id_indicador" => $indicadores_vivienda,
            "poblacion_carencia" => $poblacion_carencia,
            "total_poblacion_carencia" => $total_poblacion_carencia,
            "monto_obra" => $monto_obra,
            "fuente_financiamiento" => $fuente_financiamiento,
            "avance_financiero" => $avance_financiero,
            "avance_fisico" => $avance_fisico,
            "geo_localizacion" => $geo_localizacion,
            "id_archivo_fotorgrafico" => 1,
            "fecha_captura" => $date,
            "mes_curso" => $mes,
            "year_curso" => $year

        );

        $this->db->insert('analitico_obras', $data);
        if ($this->db->affected_rows() > 0) {
            return "succes";
        } else {
            return "error";
        }
    }

    public function insertAnaliticoForta(
        $ejercicio_fiscal,
        $nombre_entidad,
        $clave_entidad,
        $nombre_municipio,
        $clave_municipio,
        $nombre_localidad,
        $clave_localidad,
        $numero_obra,
        $ubicacion_obra,
        $tipo_localidad,
        $rubro_accion,
        $poblacion_total,
        $poblacion_referencia,
        $poblacion_objetivo,
        $poblacion_atendida,
        $numero_hombres,
        $numero_mujeres,
        $grado_marginacion,
        $monto_obra,
        $fuente_financiamiento,
        $avance_financiero,
        $avance_fisico,
        $geo_localizacion,
        $date,
        $mes,
        $year
    ) {

        $data = array(
            "ejercicio_fiscal" => $ejercicio_fiscal,
            "nombre_entidad" => $nombre_entidad,
            "clave_entidad" => $clave_entidad,
            "id_municipio" => $nombre_municipio,
            "clave_municipio" => $clave_municipio,
            "id_localidad" => $nombre_localidad,
            "clave_localidad" => $clave_localidad,
            "numero_obra" => $numero_obra,
            "ubicacion_obra" => $ubicacion_obra,
            "id_tipo_localidad" => $tipo_localidad,
            "id_rubro" => $rubro_accion,
            "poblacion_total" => $poblacion_total,
            "poblacion_referencia" => $poblacion_referencia,
            "poblacion_objetivo" => $poblacion_objetivo,
            "poblacion_atendida" => $poblacion_atendida,
            "hombres" => $numero_hombres,
            "mujeres" => $numero_mujeres,
            "grado_marginacion" => $grado_marginacion,
            "monto_obra" => $monto_obra,
            "fuente_financiamiento" => $fuente_financiamiento,
            "avance_financiero" => $avance_financiero,
            "avance_fisico" => $avance_fisico,
            "geo_localizacion" => $geo_localizacion,
            "id_archivo_fotorgrafico" => 1,
            "fecha_captura" => $date,
            "mes_curso" => $mes,
            "year_curso" => $year
        );

        $this->db->insert('analitico_obras', $data);
        if ($this->db->affected_rows() > 0) {
            return "succes";
        } else {
            return "error";
        }
    }


    public function getAllAnaliticoForMunicipioFISM($id_municipio)
    {
        $this->db->select('*');
        /* $this->db->from('analitico_obras ao');
        $this->db->join('municipios m', 'm.id_municipio = ao.id_municipio');
        $this->db->join('localidades l', 'l.idlocalidad = ao.id_localidad'); */

        $this->db->from('analitico_obras ao');
        $this->db->join('municipios m', 'm.id_municipio = ao.id_municipio');
        $this->db->join('localidades l', 'l.idlocalidad = ao.id_localidad');
        $this->db->join('tipo_localidad tl', 'tl.id_tipo_localidad = ao.id_tipo_localidad');
        $this->db->join('indicadores i', 'i.id_indicador = ao.id_indicador');
        $this->db->join('criterios_asignacion ca', 'ca.id_criterio_asignacion = ao.id_criterio');
        $this->db->join('rubro r', 'r.id_rubro = ao.id_rubro');



        $this->db->where('ao.id_municipio', $id_municipio);
        $this->db->where('ao.fuente_financiamiento', 'FISM');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function getAllAnaliticoForMunicipioFORTAMUN($id_municipio)
    {
        $this->db->select('*');
        $this->db->from('analitico_obras ao');
        $this->db->join('municipios m', 'm.id_municipio = ao.id_municipio');
        $this->db->join('localidades l', 'l.idlocalidad = ao.id_localidad');
        $this->db->where('ao.id_municipio', $id_municipio);
        $this->db->where('ao.fuente_financiamiento', 'FORTAMUN');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function getAnaliticoForId($id_analitico)
    {
        $this->db->select('*');
        $this->db->from('analitico_obras');
        $this->db->where('id_analitico', $id_analitico);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return "error";
        }
    }

    public function updateAnaliticoFism(
        $ejercicio_fiscal,
        $nombre_entidad,
        $clave_entidad,
        $nombre_municipio,
        $clave_municipio,
        $nombre_localidad,
        $clave_localidad,
        $numero_obra,
        $folio_mids,
        $ubicacion_obra,
        $tipo_localidad,
        $rubro_accion,
        $poblacion_total,
        $poblacion_referencia,
        $poblacion_objetivo,
        $poblacion_atendida,
        $numero_hombres,
        $numero_mujeres,
        $grado_marginacion,
        $criterios_asignacion,
        $indicadores_vivienda,
        $poblacion_carencia,
        $total_poblacion_carencia,
        $monto_obra,
        $fuente_financiamiento,
        $avance_financiero,
        $avance_fisico,
        $geo_localizacion,
        $date,
        $id_analitico_fism
    ) {

        $data = array(
            "ejercicio_fiscal" => $ejercicio_fiscal,
            "nombre_entidad" => $nombre_entidad,
            "clave_entidad" => $clave_entidad,
            "id_municipio" => $nombre_municipio,
            "clave_municipio" => $clave_municipio,
            "id_localidad" => $nombre_localidad,
            "clave_localidad" => $clave_localidad,
            "numero_obra" => $numero_obra,
            "folio_mids" => $folio_mids,
            "ubicacion_obra" => $ubicacion_obra,
            "id_tipo_localidad" => $tipo_localidad,
            "id_rubro" => $rubro_accion,
            "poblacion_total" => $poblacion_total,
            "poblacion_referencia" => $poblacion_referencia,
            "poblacion_objetivo" => $poblacion_objetivo,
            "poblacion_atendida" => $poblacion_atendida,
            "hombres" => $numero_hombres,
            "mujeres" => $numero_mujeres,
            "grado_marginacion" => $grado_marginacion,
            "id_criterio" => $criterios_asignacion,
            "id_indicador" => $indicadores_vivienda,
            "poblacion_carencia" => $poblacion_carencia,
            "total_poblacion_carencia" => $total_poblacion_carencia,
            "monto_obra" => $monto_obra,
            "fuente_financiamiento" => $fuente_financiamiento,
            "avance_financiero" => $avance_financiero,
            "avance_fisico" => $avance_fisico,
            "geo_localizacion" => $geo_localizacion,
            "id_archivo_fotorgrafico" => 1,
            "fecha_captura" => $date


        );

        $this->db->set($data);
        $this->db->where('id_analitico', $id_analitico_fism);
        $this->db->update('analitico_obras');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function updateAnaliticoForta(
        $ejercicio_fiscal,
                $nombre_entidad,
                $clave_entidad,
                $nombre_municipio,
                $clave_municipio,
                $nombre_localidad,
                $clave_localidad,
                $numero_obra,
                $ubicacion_obra,
                $tipo_localidad,
                $rubro_accion,
                $poblacion_total,
                $poblacion_referencia,
                $poblacion_objetivo,
                $poblacion_atendida,
                $numero_hombres,
                $numero_mujeres,
                $grado_marginacion,
                $monto_obra,
                $fuente_financiamiento,
                $avance_financiero,
                $avance_fisico,
                $geo_localizacion,
                $date,
                $id_analitico_fism
    ) {

        $data = array(
            "ejercicio_fiscal" => $ejercicio_fiscal,
            "nombre_entidad" => $nombre_entidad,    
            "clave_entidad" => $clave_entidad,
            "id_municipio" => $nombre_municipio,
            "clave_municipio" => $clave_municipio,
            "id_localidad" => $nombre_localidad,
            "clave_localidad" => $clave_localidad,
            "numero_obra" => $numero_obra,
            /* "folio_mids" => $folio_mids, */
            "ubicacion_obra" => $ubicacion_obra,
            "id_tipo_localidad" => $tipo_localidad,
            "id_rubro" => $rubro_accion,
            "poblacion_total" => $poblacion_total,
            "poblacion_referencia" => $poblacion_referencia,
            "poblacion_objetivo" => $poblacion_objetivo,
            "poblacion_atendida" => $poblacion_atendida,
            "hombres" => $numero_hombres,
            "mujeres" => $numero_mujeres,
            "grado_marginacion" => $grado_marginacion,
            /* "id_criterio" => $criterios_asignacion,
            "id_indicador" => $indicadores_vivienda,
            "poblacion_carencia" => $poblacion_carencia,
            "total_poblacion_carencia" => $total_poblacion_carencia, */
            "monto_obra" => $monto_obra,
            "fuente_financiamiento" => $fuente_financiamiento,
            "avance_financiero" => $avance_financiero,
            "avance_fisico" => $avance_fisico,
            "geo_localizacion" => $geo_localizacion,
            "id_archivo_fotorgrafico" => 1,
            "fecha_captura" => $date


        );

        $this->db->set($data);
        $this->db->where('id_analitico', $id_analitico_fism);
        $this->db->update('analitico_obras');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function deteleteOneAnalitico($id)
    {
        $this->db->delete('analitico_obras', array('id_analitico' => $id));
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllObrasForMonthYear($mes, $ejercicio, $financiamiento, $id_municipio){
        $this->db->select('*');
        $this->db->from('analitico_obras ao');
        $this->db->join('municipios m', 'm.id_municipio = ao.id_municipio');
        $this->db->join('localidades l', 'l.idlocalidad = ao.id_localidad');
        $this->db->join('tipo_localidad tl', 'tl.id_tipo_localidad = ao.id_tipo_localidad');
        $this->db->join('indicadores i', 'i.id_indicador = ao.id_indicador');
        $this->db->join('criterios_asignacion ca', 'ca.id_criterio_asignacion = ao.id_criterio');
        $this->db->join('rubro r', 'r.id_rubro = ao.id_rubro');
        $this->db->where('mes_curso', $mes);
        $this->db->where('year_curso', $ejercicio);
        $this->db->where('fuente_financiamiento', $financiamiento);
        $this->db->where('ao.id_municipio', $id_municipio);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }


    public function getAllObrasForMonthYearForta($mes, $ejercicio, $financiamiento, $id_municipio){
        $this->db->select('*');
        $this->db->from('analitico_obras ao');
        $this->db->join('municipios m', 'm.id_municipio = ao.id_municipio');
        $this->db->join('localidades l', 'l.idlocalidad = ao.id_localidad');
        $this->db->join('tipo_localidad tl', 'tl.id_tipo_localidad = ao.id_tipo_localidad');
        /* $this->db->join('indicadores i', 'i.id_indicador = ao.id_indicador');
        $this->db->join('criterios_asignacion ca', 'ca.id_criterio_asignacion = ao.id_criterio');
        $this->db->join('rubro r', 'r.id_rubro = ao.id_rubro'); */
        $this->db->where('mes_curso', $mes);
        $this->db->where('year_curso', $ejercicio);
        $this->db->where('fuente_financiamiento', $financiamiento);
        $this->db->where('ao.id_municipio', $id_municipio);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
}

/* End of file AnaliticoModel.php */
