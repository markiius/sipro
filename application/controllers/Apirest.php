<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apirest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Apimodel');
    }

    public function index()
    {
        echo 'Api rest funcionando';
    }

    public function iniciarSesion(){
        if($this->input->post()){
            header('Access-Control-Allow-Origin: *');
            $correo = $this->input->post('correo');
            $pass = $this->input->post('pass');
            $res = $this->Apimodel->validarLogin($correo,$pass);
            echo json_encode($res);
        }
    }

    public function consultarMuncipio(){
        if($this->input->post()){
            $idMunicipio = $this->input->post('idMunicipio');
            $res = $this->Apimodel->getMunicipio($idMunicipio);
            echo json_encode($res);
        }
    }

    public function getActividades(){
        if($this->input->post()){
            $idUsuario = $this->input->post('idUsuario');
            $res = $this->Apimodel->consultarActividades($idUsuario);
            echo json_encode($res);
        }
    }

    public function saveSolicitud(){
        if($this->input->post()){
        $fechaSolicitud = $this->input->post('fechaSolicitud');
        $nombreResponsable = $this->input->post('nombreResponsable');
        $arearesponsable = $this->input->post('arearesponsable');
        $cargo = $this->input->post('cargo');
        $rfc = $this->input->post('rfc');
        $numeroPersonas = $this->input->post('numeroPersonas');
        $telefono = $this->input->post('telefono');
        $lugarComision = $this->input->post('lugarComision');
        $objetivoGeneral = $this->input->post('objetivoGeneral');
        $medioTransporte = $this->input->post('medioTransporte');
        $numeroCuenta = $this->input->post('numeroCuenta');
        $numeroTarjeta = $this->input->post('numeroTarjeta');
        $nombreTitular = $this->input->post('nombreTitular');
        $institucionBancaria = $this->input->post('institucionBancaria');
        $clabeInterbancaria = $this->input->post('clabeInterbancaria');
        $correoElectronico = $this->input->post('correoElectronico');
        $idusuario = $this->input->post('idusuario');
        $idmunicipio = $this->input->post('idmunicipio');
        $idactividad = $this->input->post('idactividad');
        $res = $this->Apimodel->guardarSolicitud($fechaSolicitud,$nombreResponsable,$arearesponsable,$cargo,$rfc,$numeroPersonas,
        $telefono,$lugarComision,$objetivoGeneral,$medioTransporte,$numeroCuenta,$numeroTarjeta,$nombreTitular,
        $institucionBancaria,$clabeInterbancaria,$correoElectronico,$idusuario,$idmunicipio,$idactividad);
        echo json_encode($res);
    }
}

public function getSolicitudes(){
    if($this->input->post()){
        $idusuario = $this->input->post('idusuario');
        $idmunicipio = $this->input->post('idmunicipio');
        $idactividad = $this->input->post('idactividad');
        $res = $this->Apimodel->obtenerSolicitudes($idusuario,$idmunicipio,$idactividad);
        echo json_encode($res);
    }
}

public function guardarImportes(){
    if($this->input->post()){
            $tarifaSinPernoctar = $this->input->post('tarifaSinPernoctar');
            $numeroDiasSin = $this->input->post('numeroDiasSin');
            $tarifaPernoctando = $this->input->post('tarifaPernoctando');
            $numeroDiasCon = $this->input->post('numeroDiasCon');
            $total = $this->input->post('total');
            $casetas = $this->input->post('casetas');
            $pasajes = $this->input->post('pasajes');
            $idusuario = $this->input->post('idusuario');
            $idactividad = $this->input->post('idactividad');
            $idmunicipio = $this->input->post('idmunicipio');
            $idsolicitud = $this->input->post('idsolicitud');
            $res = $this->Apimodel->saveImportesBD($tarifaSinPernoctar,$numeroDiasSin,$tarifaPernoctando,
            $numeroDiasCon,$total,$casetas,$pasajes,$idusuario,$idactividad,$idmunicipio,$idsolicitud);
            if($res){
                $this->Apimodel->cambiarEstado($idsolicitud,"1");
                echo json_encode($res);
            }
    }
}

public function infoSolicitud(){
    if($this->input->post()){
        $idSolicitud = $this->input->post('idSolicitud');
        $infoSolicitud = $this->Apimodel->getInfoSolicitud($idSolicitud);
        echo json_encode($infoSolicitud);
    }
}

public function infoImportes(){
    if($this->input->post()){
        $idSolicitud = $this->input->post('idSolicitud');
        $infoImportes = $this->Apimodel->getInfoImportes($idSolicitud);
        echo json_encode($infoImportes);
    }
}

public function getSolicitudesPendientes(){
    if($this->input->post()){
        $idmunicipio = $this->input->post('idmunicipio');
        $res = $this->Apimodel->obtenerSolicitudesPendientes($idmunicipio);
        echo json_encode($res);
    }
}

public  function  saveMontos (){
    if($this->input->post()){
        $montoViaticos = $this->input->post('montoViaticos');
        $montoCasetas = $this->input->post('montoCasetas');
        $montoPasajes = $this->input->post('montoPasajes');
        $idSolicitud = $this->input->post('idSolicitud');
        $data = array(
            "viaticos" => $montoViaticos,
            "casetas" => $montoCasetas,
            "pasajes" => $montoPasajes,
            "idsolicitud" => $idSolicitud           
        );
        $res = $this->Apimodel->guardarMontos($data);
        echo json_encode($res);
    }
}

public function saveFirma(){
    if($this->input->post()){
        $firma = $this->input->post('firma');
        $idSolicitud = $this->input->post('idSolicitud');
        $data = array(
            "firma" => $firma,
            "idsolicitud" => $idSolicitud
        );
        $res = $this->Apimodel->saveFirmaBd($data);
        echo json_encode($res);
    }
}

public function cambiarEstatus(){
    if($this->input->post()){
        $estado = $this->input->post('estado');
        $idsolicitud = $this->input->post('idsolicitud');
        $res = $this->Apimodel->cambiarEstado($idsolicitud,$estado);
        echo json_encode($res);
    }
}

public function getMontos(){
    if($this->input->post()){
        $idSolicitud = $this->input->post('idSolicitud');
        $res = $this->Apimodel->consutarMontos($idSolicitud);
        echo json_encode($res);
    }
}

}