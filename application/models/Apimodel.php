<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apimodel extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
	}

    public function validarLogin($correo,$pass){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('usuario', $correo);
        $this->db->where('password', $pass);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }

    public function getMunicipio($idMunicipio){
        $this->db->select('*');
        $this->db->from('municipios');
        $this->db->where('id_municipio', $idMunicipio);
        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }  
    }

    public function consultarActividades($idUsuario){
        $this->db->select('AC.id_actividad,PRO.nombre_programa,PRO.objetivo_programa,
        CO.nombre_componente,AC.nombre_actividad,FE.mes,PRO.ejercicio_fiscal');
		$this->db->from('actividades AC');
        $this->db->join('programas PRO', 'AC.id_programa = PRO.id_programa');
        $this->db->join('componentes CO', 'AC.id_componente = CO.id_componente');
		$this->db->join('actividades_fechas FE', 'AC.id_actividad = FE.id_actividad');
		$this->db->where('AC.id_usuario', $idUsuario);
        $this->db->group_by('AC.id_actividad');
		$query = $this->db->get();

		if( $query->num_rows() > 0 ){
			return $query->result();
		} else {
			return false;
		}
    }

    public function guardarSolicitud($fechaSolicitud,$nombreResponsable,$arearesponsable,$cargo,$rfc,$numeroPersonas,
    $telefono,$lugarComision,$objetivoGeneral,$medioTransporte,$numeroCuenta,$numeroTarjeta,$nombreTitular,
    $institucionBancaria,$clabeInterbancaria,$correoElectronico,$idusuario,$idmunicipio,$idactividad){
        $data = array(
            "fechasolicitud" => $fechaSolicitud,
            "nombreresponsable" => $nombreResponsable,
            "arearesponsable" => $arearesponsable,
            "cargo" => $cargo,
            "rfc" => $rfc,
            "numeropersonas" => $numeroPersonas,
            "telefono" => $telefono,
            "lugarcomision" => $lugarComision,
            "objetivogeneral" => $objetivoGeneral,
            "mediotransporte" => $medioTransporte,
            "numerocuenta" => $numeroCuenta,
            "numerotarjeta" => $numeroTarjeta,
            "nombretitular" => $nombreTitular,
            "institucionbancaria" => $institucionBancaria,
            "clabeinterbancaria" => $clabeInterbancaria,
            "correoelectronico" => $correoElectronico,
            "idusuario" => $idusuario,
            "idmunicipio" => $idmunicipio,
            "idactividad" => $idactividad            
        );
        $this->db->insert("tv_solicitud", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function obtenerSolicitudes($idusuario,$idmunicipio,$idactividad){
        $this->db->select('id,fechasolicitud,nombreresponsable,arearesponsable,lugarcomision,objetivogeneral,estado,numeropersonas');
		$this->db->from('tv_solicitud');
		$this->db->where('idusuario', $idusuario);
        $this->db->where('idmunicipio', $idmunicipio);
        $this->db->where('idactividad', $idactividad);
        
		$query = $this->db->get();

		if( $query->num_rows() > 0 ){
			return $query->result();
		} else {
			return false;
		}        
    }

    public function saveImportesBD($tarifaSinPernoctar,$numeroDiasSin,$tarifaPernoctando,
    $numeroDiasCon,$total,$casetas,$pasajes,$idusuario,$idactividad,$idmunicipio,$idsolicitud){
        $data = array(
            "tarifasinpernoctar" => $tarifaSinPernoctar,
            "numerodiassin" => $numeroDiasSin,
            "tarifaPernoctando" => $tarifaPernoctando,
            "numerodiascon" => $numeroDiasCon,
            "total" => $total,
            "casetas" => $casetas,
            "pasajes" => $pasajes,
            "idusuario" => $idusuario,
            "idactividad" => $idactividad,
            "idmunicipio" => $idmunicipio,
            "idsolicitud" => $idsolicitud           
        );
        $this->db->insert("tv_importes", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function cambiarEstado($idSolicitud,$estado){
        $this->db->set('estado', $estado);
		$this->db->where('id', $idSolicitud);
		return $this->db->update('tv_solicitud');
    }

    public function getInfoSolicitud($idSolicitud){
        $this->db->select('*');
		$this->db->from('tv_solicitud');
		$this->db->where('id', $idSolicitud);
        
		$query = $this->db->get();

		if( $query->num_rows() > 0 ){
			return $query->result();
		} else {
			return false;
		}        
    }

    public function getInfoImportes($idSolicitud){
        $this->db->select('*');
		$this->db->from('tv_importes');
		$this->db->where('idsolicitud', $idSolicitud);
        
		$query = $this->db->get();

		if( $query->num_rows() > 0 ){
			return $query->result();
		} else {
			return false;
		}
    }

    public function obtenerSolicitudesPendientes($idmunicipio){
        $this->db->select('*');
		$this->db->from('tv_solicitud');
		$this->db->where('idmunicipio', $idmunicipio);
        $this->db->where('estado','1');
        
		$query = $this->db->get();

		if( $query->num_rows() > 0 ){
			return $query->result();
		} else {
			return false;
		}
    }

     public  function  guardarMontos($data){ 
        $this->db->insert("tv_montos", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }        
    }

    public function saveFirmaBd($data){
        $this->db->insert("tv_firmasautorizacions", $data);
        if($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function consutarMontos($idSolicitud){
        $this->db->select('*');
		$this->db->from('tv_montos');
		$this->db->where('idsolicitud', $idSolicitud);
        
		$query = $this->db->get();

		if( $query->num_rows() > 0 ){
			return $query->result();
		} else {
			return false;
		}        
    }
}

/* End of file ActividadModel.php */
