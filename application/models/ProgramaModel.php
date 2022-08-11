<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class ProgramaModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        
    }

    public function createPrograma($nombre_programa, $objetivo_programa, $ejercicio_fiscal, $id_municipio)
    {
        $data = array(
            "nombre_programa" => $nombre_programa,
            "objetivo_programa" => $objetivo_programa,
            "ejercicio_fiscal" => $ejercicio_fiscal,
            "id_municipio" => $id_municipio
        );

        $this->db->insert('programas', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return $this->db->error();
        }

    }

    /* OBTENER PROGRAMAS POR MUNICIPIO */
    public function getAllProgramasMunicipio($id_municipio)
    {
        $this->db->select('*');
        $this->db->from('programas');
        $this->db->where('id_municipio', $id_municipio);
        $query = $this->db->get();
        return $query->result();
    }

    /* OBTENER UN PROGRAMA POR ID */
    public function getOneProgramaComponente($id_programa)
    {
        $this->db->select('*');
        $this->db->from('programas');
        $this->db->where('id_programa', $id_programa);
        $query = $this->db->get();
        return $query->row();
    }
    
    /* MODIFICAR UN PROGRAMA */
    public function updatePrograma($id_programa, $nombre_programa, $objetivo_programa, $ejercicio_fiscal)
    {
        $data = array(
            "nombre_programa"   => $nombre_programa,
            "objetivo_programa" => $objetivo_programa,
            "ejercicio_fiscal"  => $ejercicio_fiscal
        );
        $this->db->set($data);
        $this->db->where('id_programa', $id_programa);
        $this->db->update('programas');

        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }


    public function getPrograma()
    {   
        $id_municipio = $this->session->userdata('municipio');
        $this->db->select('*');
        $this->db->from('programas');
        $this->db->join('componentes', 'componentes.id_programa = programas.id_programa');
        $this->db->join('actividades', 'actividades.id_componente = componentes.id_componente');
        $this->db->join('usuarios', 'usuarios.id_usuario = actividades.id_usuario');
        $this->db->join('unidades_responsables', 'unidades_responsables.id_unidad_responsable = usuarios.id_unidad_responsable');
        $this->db->join('actividades_fechas', 'actividades_fechas.id_actividad = actividades.id_actividad');
        $this->db->where('usuarios.id_municipio', $id_municipio);
        $this->db->where('actividades_fechas.mes', "enero");
        $query = $this->db->get();
        return $query->result();

    }


    public function insertPrograma($dependencia, $nombreTitular, $nombrePrograma, $objetivoPrograma, 
    $numeroComponente, $nombreComponente, $fechaReporte)
    {   
        $municipio_id = $this->session->userdata('municipio');
        $data = array(
            
            "municipio_id" => $municipio_id ,
            "direccion_dependencia" => $dependencia ,
            "nombre_titular" => $nombreTitular ,
            "nombre_programa" => $nombrePrograma ,
            "objetivo_programa" => $objetivoPrograma ,
            "numero_componente" => $numeroComponente ,
            "nombre_componente" => $nombreComponente ,
            "fecha_reporte" => $fechaReporte 

        );

        $query = $this->db->insert("programas", $data);

    }

    public function insertProgramaDetalle($numeroComponente, $numeroActividad, $nombreActividad, $unidadMedida,
    $mesInforma, $numeroIndicadorMesProgramado, $numeroIndicadorMesrealizado, $enCasoDeNoEjecutar, $numeroPoblacion, $numeroHombres, $numeroMujeres, $nombreLocalidadesAtendidas,
    $descripcionServiciosBienes, $descripcionDeEvidenciaDocumental, $actividad_id)
    {
        $data = array(
            "id_programa_detalle" => null,
            "numero_componente" => $numeroComponente,
            "numero_actividad" => $numeroActividad ,
            "nombre_actividad" => $nombreActividad ,
            "unidad_medida" => $unidadMedida ,
            "mes_informa" => $mesInforma ,
            "numero_indicador_mes_programado" => $numeroIndicadorMesProgramado ,
            "numero_indicador_mes_realizado" => $numeroIndicadorMesrealizado ,
            "actividad_no_ejecutada" => $enCasoDeNoEjecutar ,
            "poblacion_atendida" => $numeroPoblacion ,
            "numero_hombre" => $numeroHombres ,
            "numero_mujeres" => $numeroMujeres ,
            "nombre_localidades_atendidas" => $nombreLocalidadesAtendidas ,
            "descripcion_servicios" => $descripcionServiciosBienes ,
            "descripcion_evidencia" => $descripcionDeEvidenciaDocumental,
            "programa_id" => $actividad_id
        );

        $this->db->insert('actividades_detalle', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return $this->db->error();
        }
    }


    public function getActividades()
    {
        $id = $this->session->userdata('usuario');
        $this->db->select('*');
        $this->db->from('programas');
        $this->db->join('programas_detalle', 'programas_detalle.programa_id = programas.id_programa');
        $this->db->where('usuario_id', $id);
        $query = $this->db->get();
        if($query){
            return $query->result();
        }else{
            return $this->db->error();
        }
    }

    public function getOnePrograma()
    {
        $id_municipio = $this->session->userdata('municipio');
        $this->db->select('*');
        $this->db->from('programas');
        $this->db->join('componentes', 'componentes.id_programa = programas.id_programa');
        $this->db->join('actividades', 'actividades.id_componente = componentes.id_componente');
        $this->db->join('usuarios', 'usuarios.id_usuario = actividades.id_usuario');
        $this->db->join('unidades_responsables', 'unidades_responsables.id_unidad_responsable = usuarios.id_unidad_responsable');
        $this->db->join('actividades_fechas', 'actividades_fechas.id_actividad = actividades.id_actividad');
        $this->db->where('usuarios.id_municipio', $id_municipio);
        $this->db->where('actividades_fechas.mes', "enero");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getProgramaId($id)
    {
        $this->db->select('*');
        $this->db->from('programas P');
        $this->db->join('componentes C', 'C.id_programa = P.id_programa');
        $this->db->join('actividades A', 'A.id_componente = C.id_componente');
        $this->db->join('usuarios U', 'U.id_usuario = A.id_usuario');
        $this->db->join('unidades_responsables UR', 'UR.id_unidad_responsable = U.id_unidad_responsable');
        $this->db->join('actividades_fechas AF', 'AF.id_actividad = A.id_actividad');
        $this->db->where('P.id_programa', $id);

        $query = $this->db->get();
        return $query->result();
    }

    public function createReporte($id_actividad, $personas_atendidas, $fecha_actividad, $localidades_atendidas,$direcciones_dependencias, $fotografia1, $fotografia2, $id_actividad_para_evidencia)
    {
         $data = array(
            "personas_atendidas" => $personas_atendidas ,
            "fecha_actividad" => $fecha_actividad ,
            "direcciones_dependencias" => $direcciones_dependencias,
            "fotografia_1" => $fotografia1,
            "fotografia_2" => $fotografia2,
            "id_actividades_fechas" => $id_actividad,
            "id_actividad" => $id_actividad_para_evidencia,
            "localidades_atendidas" => $localidades_atendidas

        ); 

        $this->db->insert('reporte_fotografico', $data);
        if($this->db->affected_rows() > 0){
            return "success";
        }else{
            return "false";
        }
    }

    public function getReporteActividad($id) 
    {
        $this->db->select('*');
        $this->db->from('reporte_fotografico');
        $this->db->where('id_actividades_fechas', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    /* OBTENER EL MUNICIPIO DE    UN PROGRAMA */
    public function getOneProgramaMunicipio($id)
    {
        $this->db->select('*');
        $this->db->from('programas p');
        $this->db->join('municipios m', 'm.id_municipio = p.id_municipio');
        $this->db->where('p.id_programa', $id);
        $query = $this->db->get();
        return $query->row();
    }

    /* ELIMINAR UNA EVIDENCIA */
    public function deleteOneEvidencia($id)
    {

        $this->db->where('id_reporte_fotografico', $id);
        $this->db->delete('reporte_fotografico');
        if($this->db->affected_rows() > 0){
            return "success";
        }else{
            return "false";
        }

    }
    
    public function getOneEvidenciaFotografica($id_reporte){
        $this->db->select('*');
        $this->db->from('reporte_fotografico');
        $this->db->where('id_reporte_fotografico', $id_reporte);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function deletePrograma($id_programa)
    {
        $this->db->where('id_programa', $id_programa);
        $this->db->delete('programas');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function cargarDocumentacion($nombre_documento, $id_actividad, $id_actividad_fecha){

        $data = array(
            "nombre_documento" => $nombre_documento,
            "id_actividad" => $id_actividad,
            "id_actividad_fecha" => $id_actividad_fecha
        );

        $this->db->insert("reporte_documentos", $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

    }

    public function getDocumentos($id_actividad, $id_actividad_fecha)
    {
        $this->db->select("*");
        $this->db->from("reporte_documentos");
        $this->db->where("id_actividad", $id_actividad);
        $this->db->where("id_actividad_fecha", $id_actividad_fecha);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function getOneDocumento($id_documento)
    {
        $this->db->select('*');
        $this->db->from('reporte_documentos');
        $this->db->where('id_documento',$id_documento);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }

    }

    public function deleteDocumento($id_documento){

        $this->db->delete("reporte_documentos", array("id_documento" => $id_documento));
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function getDocumentosAdmin($id_actividad)
    {
        $this->db->select("*");
        $this->db->from("reporte_documentos");
        $this->db->where("id_actividad", $id_actividad);
        //$this->db->where("id_actividad_fecha", $id_actividad_fecha);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    

    
}

/* End of file actividadesModel.php */
