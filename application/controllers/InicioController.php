<?php


defined('BASEPATH') or exit('No direct script access allowed');

class InicioController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('usuario')) {
            header('Location: ' . base_url());
        }
        $this->load->model('ProgramaModel');
        $this->load->model('MunicipioModel');
    }

    public function index()
    {
    }

    public function bienvenido()
    {
        $idUsuario = $this->session->userdata('usuario');
        $id_municipio = $this->session->userdata('municipio');

        $data = array();
        $data['municipio'] = $this->MunicipioModel->getOneMunicipio($id_municipio);
        $data['unidad'] = $this->UnidadModel->getUnidadUpdate($this->session->userdata('unidadResponsable'));
        $data['programas']  = $this->ActividadModel->getActividadesUsuario($idUsuario);

        $this->load->view('partials/header');
        $this->load->view('partials/navbar');

        $this->load->view('cliente/inicioPrograma', $data);
        $this->load->view('partials/footer');
    }

    public function bienvenidoAdministrador()
    {
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('administrador/inicioAdministrador');
        $this->load->view('partials/footer');
    }

    public function programa($id)
    {
        $date = date("m");
        $mes = "";
        switch ($date) {
            case 01:
                $mes = "enero";
                break;
            case 02:
                $mes = "febrero";
                break;
            case 03:
                $mes = "marzo";
                break;
            case 04:
                $mes = "abril";
                break;
            case 05:
                $mes = "mayo";
                break;
            case 06:
                $mes = "junio";
                break;
            case 07:
                $mes = "julio";
                break;
            case 8:
                $mes = "agosto";
                break;
            case 9:
                $mes = "septiembre";
                break;
            case 10:
                $mes = "octubre";
                break;
            case 11:
                $mes = "noviembre";
                break;
            case 12:
                $mes = "diciembre";
                break;
        }

        $idUsuario = $this->session->userdata('usuario');
        $id_municipio = $this->session->userdata('municipio');

        $data = array();
        $data['municipio'] = $this->MunicipioModel->getOneMunicipio($id_municipio);
        $data['unidad'] = $this->UnidadModel->getUnidadUpdate($this->session->userdata('unidadResponsable'));
        $data['programa']  = $this->ActividadModel->getActividadesPrograma($id);
        $data['actividad']  = $this->ActividadModel->getActividadesUsuarioPrograma($idUsuario, $id, $mes);
        $data['ifoActividad']  = $this->ActividadModel->getInfoActividadesFecha($idUsuario, $id, $mes);


        $this->load->view('partials/header');
        $this->load->view('partials/navbar');

        $this->load->view('cliente/programa', $data);
        $this->load->view('partials/footer');
    }

    public function buscarActividadFecha()
    {
        if ($this->input->post()) {
            $id   = $this->input->post('id');
            $response =  $this->ActividadModel->getActividadFecha($id);
            echo json_encode($response);
        }
    }

    public function buscarInformacionActividadFecha()
    {
        if ($this->input->post()) {
            $id   = $this->input->post('id');
            $response =  $this->ActividadModel->getInfo($id);
            echo json_encode($response);
        }
    }

    public function llenarActividad()
    {
        if ($this->input->post()) {
            $id_actividad_fecha = $this->input->post('id_actividad_fecha');
            $id_actividad = $this->input->post('id_actividad');
            $indicadoresRealizados = $this->input->post('indicadoresRealizados');
            $justificacion    = $this->input->post('justificacion');
            $numeroHombres    = $this->input->post('numeroHombres');
            $numeroMujeres    = $this->input->post('numeroMujeres');
            $numeroPblacion  = $numeroHombres + $numeroMujeres;
            $nombreLocalidadesAtendidas       = $this->input->post('nombreLocalidadesAtendidas');
            $descripcionServiciosBienes    = $this->input->post('descripcionServiciosBienes');
            $descripcionDeEvidenciaDocumental    = $this->input->post('descripcionDeEvidenciaDocumental');

            $reponse = $this->ActividadModel->llenarActividad($id_actividad_fecha, $indicadoresRealizados, $justificacion, $numeroPblacion, $numeroHombres, $numeroMujeres, $nombreLocalidadesAtendidas, $descripcionServiciosBienes, $descripcionDeEvidenciaDocumental);
            echo $reponse;
        }
    }


    public function updateActividad()
    {
        if ($this->input->post()) {
            $id_actividad_fecha = $this->input->post('id_actividad_fecha');
            $indicadoresRealizados = $this->input->post('indicadoresRealizados');
            $justificacion    = $this->input->post('justificacion');
            $numeroHombres    = $this->input->post('numeroHombres');
            $numeroMujeres    = $this->input->post('numeroMujeres');
            $numeroPblacion  = $numeroHombres + $numeroMujeres;
            $nombreLocalidadesAtendidas       = $this->input->post('nombreLocalidadesAtendidas');
            $descripcionServiciosBienes    = $this->input->post('descripcionServiciosBienes');
            $descripcionDeEvidenciaDocumental    = $this->input->post('descripcionDeEvidenciaDocumental');

            $reponse = $this->ActividadModel->updateInfoActividad($id_actividad_fecha, $indicadoresRealizados, $justificacion, $numeroPblacion, $numeroHombres, $numeroMujeres, $nombreLocalidadesAtendidas, $descripcionServiciosBienes, $descripcionDeEvidenciaDocumental);
            echo $reponse;
        }
    }

    public function subirEvidencia()
    {
        if ($this->input->post()) {
            $id_actividad_fecha = $this->input->post('id_actividad_fecha');
            $evidencia = $this->input->post('evidencia');

            $reponse = $this->FechaModel->setEvidencia($id_actividad_fecha, $evidencia);
            echo $reponse;
        }
    }

    public function getEvidencia()
    {
        if ($this->input->post()) {
            $id_actividad_fecha = $this->input->post('id_actividad_fecha');

            $reponse = $this->FechaModel->getEvidencia($id_actividad_fecha);
            echo json_encode($reponse);
        }
    }

    public function crearReporteFotografico()
    {
        if ($this->input->post()) {
            
            $id_actividad = $this->input->post('id_actividad_f');
            $personas_atendidas = $this->input->post('personas_atendidas');
            $fecha_actividad = $this->input->post('fecha_actividad');
            $localidades_atendidas = $this->input->post('localidades_atendidas');
            $direcciones_dependencias    = $this->input->post('direcciones_dependencias');
            $id_actividad_para_evidencia = $this->input->post('id_actividad_para_evidencia_f');
            
            $evidencia_1 = $this->input->post('evidencia_1');
            $evidencia_2 = $this->input->post('evidencia_2');

            $evidencia_1 = basename($_FILES["evidencia_1"]["name"]/* .".".pathinfo($_FILES["evidencia_1"]["name"],PATHINFO_EXTENSION) */);
            $evidencia_2 = basename($_FILES["evidencia_2"]["name"]/* .".".pathinfo($_FILES["evidencia_2"]["name"],PATHINFO_EXTENSION) */);

            $nombre_evidencia1 = "";
            $nombre_evidencia2 = "";

            $nombre_archivo_1 = "";
            $nombre_archivo_2 = "";

            /* var_dump($_FILES);
            var_dump($evidencia_1);
            var_dump($evidencia_2);
            exit(); */
            if ($evidencia_1 != '') {
                $mi_archivo1 = 'evidencia_1';
                $nombre_evidencia1 = rand().$evidencia_1;
                $config['upload_path'] = "uploads/";
                $config['file_name'] = $nombre_evidencia1;
                $config['allowed_types'] = "*";
                $config['max_size'] = "50000";
                $config['max_width'] = "9000";
                $config['max_height'] = "9000";
                $config['file_ext'] = ".".pathinfo($_FILES["evidencia_1"]["name"],PATHINFO_EXTENSION);
                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload($mi_archivo1)) {
                    $resultado = $this->upload->data();
                    $nombre_archivo_1 = $resultado["file_name"];
                   
                }
            }

            if($evidencia_2 != ''){
                $mi_archivo2 = 'evidencia_2';
                $nombre_evidencia2 = rand().$evidencia_2;
                $config2['upload_path'] = "uploads/";
                $config2['file_name'] = $nombre_evidencia2;
                $config2['allowed_types'] = "*";
                $config2['max_size'] = "50000";
                $config2['max_width'] = "9000";
                $config2['max_height'] = "9000";
                $config['file_ext'] = ".".pathinfo($_FILES["evidencia_2"]["name"],PATHINFO_EXTENSION);
                $this->load->library('upload', $config2);

                if ($this->upload->do_upload($mi_archivo2)) {
                    $resultado = $this->upload->data();
                    $nombre_archivo_2 = $resultado["file_name"];
                    
                }
            }

            /* echo " resultado == personas atendidas = ".$personas_atendidas."   fecha = ".$fecha_actividad."   direcciones  = ".
            $direcciones_dependencias."    fotografia 1 = ".$nombre_archivo_1."   fotografia 2 = ".$nombre_archivo_2." **1"; */

            $response = $this->ProgramaModel->createReporte($id_actividad, $personas_atendidas, $fecha_actividad, $localidades_atendidas, $direcciones_dependencias, $nombre_archivo_1, $nombre_archivo_2, $id_actividad_para_evidencia);
            $data['uploadSuccess'] = $this->upload->data();
            echo $response;
        } else {
            echo "No hay informacion";
        }
    }

    
    public function obtenerReportesCargado()
    {
        
        /*$data['evidencias'] = $this->ProgramaModel->getReporteActividad($id);
        $this->load->view('partials/header');
        $this->load->view('partials/navbar');
        $this->load->view('cliente/evidencia_actividad', $data);
        $this->load->view('partials/footer');*/
        
        $id = $this->input->post('id_actividad_fecha');
        $data = $this->ProgramaModel->getReporteActividad($id);
        
        $cadena = '';
        $cont = 1;
        foreach ($data as $key => $value){
            $cadena = $cadena.'
            <tr>
                <td>'. $cont .'</td>
                <td>'. $value->personas_atendidas .'</td>
                <td>'. $value->fecha_actividad .'</td>
                <td>'. $value->direcciones_dependencias .'</td>
                <td>'. $value->localidades_atendidas .'</td>
                <td><img src="'. base_url() .'uploads/'. $value->fotografia_1 .'" alt="" width="100" height="100"></td>
                <td><img src="'. base_url() .'uploads/'. $value->fotografia_2 .'" alt="" width="100" height="100"></td>
                <td align="center"><i onclick="eliminarReporteActividad('.$value->id_reporte_fotografico.')" class="fas fa-trash-alt" style="color: red;"></i></td>
            </tr>
            ';
        }
        echo $cadena;
        
    }

    public function eliminarActividad(){
        /*if($this->input->post()){
            $id_evidencia = $this->input->post('id_evidencia');
            $reponse = $this->ProgramaModel->deleteOneEvidencia($id_evidencia);
            echo $reponse;
        }*/
        if($this->input->post()){
            $id_evidencia = $this->input->post('id_evidencia');

            $responseEvidencia = $this->ProgramaModel->getOneEvidenciaFotografica($id_evidencia);
            
            if($responseEvidencia){
                $response = $this->ProgramaModel->deleteOneEvidencia($id_evidencia);
                
                if($response){
                    unlink("uploads/" . $responseEvidencia->fotografia_1);
                    unlink("uploads/" . $responseEvidencia->fotografia_2);
                    echo $response;
                }
                
               
            }
        }
    }
}

/* End of file inicioController.php */
