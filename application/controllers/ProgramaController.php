<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProgramaController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('usuario')) {
            header('Location: ' . base_url());
        }
        $this->load->model('MunicipioModel');
        $this->load->model('ProgramaModel');
    }

    public function index()
    {
    }

    public function vistaPrograma($id)
    {

        $data['municipio'] = $this->MunicipioModel->getOneMunicipio($id);
        $data['programas'] = $this->ProgramaModel->getAllProgramasMunicipio($id);

        //var_dump($data);
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('administrador/programa', $data);
        $this->load->view('partials/footer');
    }


    public function crearPrograma()
    {
        if ($this->input->post()) {
            $nombre_programa   = $this->input->post('nombre_programa');
            $objetivo_programa = $this->input->post('objetivo_programa');
            $ejercicio_fiscal  = $this->input->post('ejercicio_fiscal');
            $id_municipio      = $this->input->post('id_municipio');
            $response =  $this->ProgramaModel->createPrograma($nombre_programa, $objetivo_programa, $ejercicio_fiscal, $id_municipio);

            echo $response;
        }
    }

    public function obtenerPrograma()
    {
        if ($this->input->post()) {
            $id_programa = $this->input->post('id_programa');
            $response = $this->ProgramaModel->getOneProgramaComponente($id_programa);
            echo json_encode($response);
        }
    }

    public function modificarPrograma()
    {
        if ($this->input->post()) {
            $id_programa       = $this->input->post('id_programa');
            $nombre_programa   = $this->input->post('nombre_programa');
            $objetivo_programa = $this->input->post('objetivo_programa');
            $ejercicio_fiscal  = $this->input->post('ejercicio_fiscal');
            $response = $this->ProgramaModel->updatePrograma($id_programa, $nombre_programa, $objetivo_programa, $ejercicio_fiscal);
        }
    }


    public function insertarPrograma()
    {

        if ($this->input->post()) {

            $dependencia      = $this->input->post('dependencia');
            $nombreTitular    = $this->input->post('nombreTitular');
            $nombrePrograma   = $this->input->post('nombrePrograma');
            $objetivoPrograma = $this->input->post('objetivoPrograma');
            $numeroComponente = $this->input->post('numeroComponente');
            $nombreComponente = $this->input->post('nombreComponente');
            $fechaReporte     = $this->input->post('fechaReporte');

            $dataResponse = $this->ProgramaModel->insertPrograma(
                $dependencia,
                $nombreTitular,
                $nombrePrograma,
                $objetivoPrograma,
                $numeroComponente,
                $nombreComponente,
                $fechaReporte
            );
        } else {
            echo "no_post";
        }
    }


    public function insertActividadDetalle()
    {

        if ($this->input->post()) {
            $numeroComponente = $this->input->post('numeroComponente');
            $numeroActividad = $this->input->post('numeroActividad');
            $nombreActividad = $this->input->post('nombreActividad');
            $unidadMedida = $this->input->post('unidadMedida');
            $mesInforma = $this->input->post('mesInforma');
            $numeroIndicadorMesProgramado = $this->input->post('numeroIndicadorMesProgramado');
            $numeroIndicadorMesrealizado = $this->input->post('numeroIndicadorMesrealizado');
            $enCasoDeNoEjecutar = $this->input->post('enCasoDeNoEjecutar');
            $numeroPoblacion = $this->input->post('numeroPoblacion');
            $numeroHombres = $this->input->post('numeroHombres');
            $numeroMujeres = $this->input->post('numeroMujeres');
            $nombreLocalidadesAtendidas = $this->input->post('nombreLocalidadesAtendidas');
            $descripcionServiciosBienes = $this->input->post('descripcionServiciosBienes');
            $descripcionDeEvidenciaDocumental = $this->input->post('descripcionDeEvidenciaDocumental');
            $actividad_id = $this->input->post('actividad_id');

            $response = $this->ProgramaModel->insertarActividadDetalle(
                $numeroComponente,
                $numeroActividad,
                $nombreActividad,
                $unidadMedida,
                $mesInforma,
                $numeroIndicadorMesProgramado,
                $numeroIndicadorMesrealizado,
                $enCasoDeNoEjecutar,
                $numeroPoblacion,
                $numeroHombres,
                $numeroMujeres,
                $nombreLocalidadesAtendidas,
                $descripcionServiciosBienes,
                $descripcionDeEvidenciaDocumental,
                $actividad_id
            );
        } else {
            echo "no_post";
        }
    }

    public function getActividades()
    {
        $response = $this->ActividadModel->getActividades();
        return $response;
    }

    public function vistaReporte($id_programa)
    {
        $data['programas'] = $this->ProgramaModel->getOneProgramaComponente($id_programa);
        $data['unidades'] = $this->UsuarioModel->getAreasPrograma($id_programa);

        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('administrador/reporteUsuario', $data);
        $this->load->view('partials/footer');
    }

    public function getActividadesPorUnidad()
    {
        if ($this->input->post()) {
            $id_programa = $this->input->post('id_programa');
            $id_usuario = $this->input->post('id_usuario');
            $id_mes = $this->input->post('id_mes');
            $response = $this->ActividadModel->getAllActividadPorArea($id_programa, $id_usuario, $id_mes);

            $actividad  = $this->ActividadModel->getActividadesUsuarioPrograma($id_usuario, $id_programa, $id_mes);
            $ifoActividad  = $this->ActividadModel->getInfoActividadesFecha($id_usuario, $id_programa, $id_mes);
            var_dump($actividad);
            echo json_encode($actividad);

            $cadena = '';


            $id = "";
            foreach ($actividad as $key => $value) {
                foreach ($ifoActividad as $key => $valueInfo) {
                    if ($value->id_actividad_fecha == $valueInfo->id_actividad_fecha) {
                        $id = $valueInfo->id_actividad_fecha;

                        $programado = $value->cantidad_programada;
                        $ejecutado = $valueInfo->indicador_realizado;
                        $porcentajeTotal = 0;

                        if ($programado > 0) {
                            $porcentajeTotal = ($ejecutado * 100  / $programado);
                        } else if ($programado == 0 && $ejecutado > 0) {
                            $porcentajeTotal = 1;
                        } else {
                            $porcentajeTotal = ($ejecutado * 100  / 1);
                        }

                        $status = '';
                        if ($porcentajeTotal >= 131) {
                            $status = '<span style="color: red; font-weight: bold;">Exedido</span>';
                        } else if ($porcentajeTotal >= 106 && $porcentajeTotal <= 500) {
                            $status = '<span style="color: yellow; font-weight: bold;">Sobre Estimado</span>';
                        } else if ($porcentajeTotal >= 95 && $porcentajeTotal <= 105) {
                            $status = '<span style="color: green; font-weight: bold;">Bueno</span>';
                        } else if ($porcentajeTotal >= 80 && $porcentajeTotal <= 94) {
                            $status = '<span style="color: orange; font-weight: bold;">Regular</span>';
                        } else if ($porcentajeTotal <= 79 && $porcentajeTotal >= 10) {
                            $status = '<span style="color: red; font-weight: bold;">Malo</span>';
                        } else if ($porcentajeTotal == 0) {
                            $status = '<span style="color: blue; font-weight: bold;">Actividad sin medición</span>';
                        } else if ($porcentajeTotal == 1) {
                            $status = '<span style="color: red; font-weight: bold;">Actividad ejecutada sin prgramacion</span>';
                        }

                        $cadena = $cadena . '<tr>
                            <td>' . $value->numero_componente . '</td>
                            <td>' . $value->numero_actividad . '</td>
                            <td>' . $value->nombre_actividad . ' </td>
                            <td>' . $value->unidad_medida . ' </td>
                            <td>' . $value->mes . ' </td>
                            <td>' . $value->cantidad_programada . ' </td>
                            <td>' . $valueInfo->indicador_realizado . ' </td>
                            <td>' . $porcentajeTotal . '% </td>
                            <td>' . $status . ' </td>
                            <td>' . $valueInfo->justificacion . ' </td>
                            <td>' . $valueInfo->poblacion_atendida . ' </td>
                            <td>' . $valueInfo->hombres . ' </td>
                            <td>' . $valueInfo->mujeres . ' </td>
                            <td>' . $valueInfo->nombre_localidades_atendidas . ' </td>
                            <td>' . $valueInfo->servicios_aplicados . ' </td>
                            <td>' . $valueInfo->descripcion_evidencia . ' </td>
                            <td align="center"><button  onclick="modalEvidenciaCargada(' . $value->id_actividad_fecha . ')" class="btn btn-info btn-sm"><i class="fas fa-camera"></i></button></td>
                            <td align="center"><button  onclick="obtenerInformacion(' . $value->id_actividad . ')" class="btn btn-info btn-sm"><i class="far fa-file-pdf"></i></button></td>
                        </tr>';
                    }
                }
                if ($id != $value->id_actividad_fecha) {

                    $cadena = $cadena . '<tr>
                        <td>' . $value->numero_componente . '</td>
                        <td>' . $value->numero_actividad . '</td>
                        <td>' . $value->nombre_actividad . '</td>
                        <td>' . $value->unidad_medida . '</td>
                        <td>' . $value->mes . '</td>
                        <td>' . $value->cantidad_programada . '</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>';
                }
            }
            print_r($id);


            echo $cadena;
        }
    }

    public function getActividadesPorUnidadCliente()
    {
        if ($this->input->post()) {

            $id_programa = $this->input->post('id_programa');
            $id_usuario = $this->input->post('id_usuario');
            $id_mes = $this->input->post('id_mes');
            $response = $this->ActividadModel->getAllActividadPorArea($id_programa, $id_usuario, $id_mes);

            $actividad  = $this->ActividadModel->getActividadesUsuarioPrograma($id_usuario, $id_programa, $id_mes);
            $ifoActividad  = $this->ActividadModel->getInfoActividadesFecha($id_usuario, $id_programa, $id_mes);

            echo json_encode($actividad);

            $cadena = '';

            $id = "";
            foreach ($actividad as $key => $value) {
                foreach ($ifoActividad as $key => $valueInfo) {
                    if ($value->id_actividad_fecha == $valueInfo->id_actividad_fecha) {
                        $id = $valueInfo->id_actividad_fecha;

                        $programado = $value->cantidad_programada;
                        $ejecutado = $valueInfo->indicador_realizado;
                        $porcentajeTotal = 0;

                        if ($programado > 0) {
                            $porcentajeTotal = ($ejecutado * 100  / $programado);
                        } else if ($programado == 0 && $ejecutado > 0) {
                            $porcentajeTotal = 1;
                        } else {
                            $porcentajeTotal = ($ejecutado * 100  / 1);
                        }

                        $status = '';
                        if ($porcentajeTotal >= 131) {
                            $status = '<span style="color: red; font-weight: bold;">Exedido</span>';
                        } else if ($porcentajeTotal >= 106 && $porcentajeTotal <= 500) {
                            $status = '<span style="color: yellow; font-weight: bold;">Sobre Estimado</span>';
                        } else if ($porcentajeTotal >= 95 && $porcentajeTotal <= 105) {
                            $status = '<span style="color: green; font-weight: bold;">Bueno</span>';
                        } else if ($porcentajeTotal >= 80 && $porcentajeTotal <= 94) {
                            $status = '<span style="color: orange; font-weight: bold;">Regular</span>';
                        } else if ($porcentajeTotal <= 79 && $porcentajeTotal >= 10) {
                            $status = '<span style="color: red; font-weight: bold;">Malo</span>';
                        } else if ($porcentajeTotal == 0) {
                            $status = '<span style="color: blue; font-weight: bold;">Actividad sin medición</span>';
                        } else if ($porcentajeTotal == 1) {
                            $status = '<span style="color: red; font-weight: bold;">Actividad ejecutada sin prgramacion</span>';
                        }

                        $cadena = $cadena . '<tr>
                            <td>' . $value->numero_componente . '</td>
                            <td>' . $value->numero_actividad . '</td>
                            <td>' . $value->nombre_actividad . ' </td>
                            <td>' . $value->unidad_medida . ' </td>
                            <td>' . $value->mes . ' </td>
                            <td>' . $value->cantidad_programada . ' </td>
                            <td>' . $valueInfo->indicador_realizado . ' </td>
                            <td>' . $porcentajeTotal . '% </td>
                            <td>' . $status . ' </td>
                            <td>' . $valueInfo->justificacion . ' </td>
                            <td>' . $valueInfo->poblacion_atendida . ' </td>
                            <td>' . $valueInfo->hombres . ' </td>
                            <td>' . $valueInfo->mujeres . ' </td>
                            <td>' . $valueInfo->nombre_localidades_atendidas . ' </td>
                            <td>' . $valueInfo->servicios_aplicados . ' </td>
                            <td>' . $valueInfo->descripcion_evidencia . ' </td>
                            <td align="center"><i onclick="actualizarInfo(' . $value->id_actividad_fecha . ',' . $valueInfo->id_actividad_detalle . ',' . $value->cantidad_programada . ')" class="fas fa-edit"></i></button></td>
                            <td align="center"><i onclick="modalEvidencia(' . $value->id_actividad_fecha . ',' . $value->id_actividad . ')" class="fas fa-camera"></i></button></td>
                            <td align="center"><i onclick="modalEvidenciaCargada(' . $value->id_actividad_fecha . ')" class="fas fa-eye fa-1x"></i></td>
                            
                        </tr>';
                    }
                }
                if ($id != $value->id_actividad_fecha) {

                    $cadena = $cadena . '<tr>
                        <td>' . $value->numero_componente . '</td>
                        <td>' . $value->numero_actividad . '</td>
                        <td>' . $value->nombre_actividad . '</td>
                        <td>' . $value->unidad_medida . '</td>
                        <td>' . $value->mes . '</td>
                        <td>' . $value->cantidad_programada . '</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="center"><i onclick="llenarInfo(' . $value->id_actividad_fecha . ')" class="fas fa-edit"></i></td>
                        <td></td>
                        <td></td>
                    </tr>';
                }
            }
            print_r($id);


            echo $cadena;
        }
    }

    public function eliminarPrograma()
    {
        if ($this->input->post()) {
            $id_programa = $this->input->post('id_programa');
            $response = $this->ProgramaModel->deletePrograma($id_programa);
            echo $response;
        }
    }

    public function cargaDocumentos()
    {

        sleep(3);


        $id_actividad = $_POST["id_actividad"];
        $id_actividad_fecha = $_POST['id_actividad_fecha'];

        if ($_FILES["files"]["name"] != '') {
            $output = '';
            $config["upload_path"] = 'documentos/';
            $config["allowed_types"] = '*';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            for ($count = 0; $count < count($_FILES["files"]["name"]); $count++) {
                $_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
                $_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
                $_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
                $_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
                $_FILES["file"]["size"] = $_FILES["files"]["size"][$count];

                if ($this->upload->do_upload('file')) {
                    $data = $this->upload->data();

                    $response = $this->ProgramaModel->cargarDocumentacion($data["file_name"], $id_actividad, $id_actividad_fecha);
                }
            }

            /* if ($response == true) {
                $documentosResponse = $this->ProgramaModel->getDocumentos($id_actividad, $id_actividad_fecha);
                $cadena = '';
                foreach ($documentosResponse as $key => $value) {
                    $cadena = $cadena . '   
                        <div class="col-md-4 text-center">
                            <img src="' . base_url() . 'assets/img/archivo-adjunto.png" alt="">
                            <br>
                            <a href="' . base_url() . 'documentos/' . $value->nombre_documento . '" style="color:#000;" target="_blank">Ver documento ' . $value->nombre_documento . '<i class="fas fa-eye fa-1x"></i></a>
                            <i onclick="eliminarDocumento('.$value->id_documento.','.$value->nombre_documento.')" style="color:#D80000;" class="fas fa-trash-alt"></i>
                        </div>
                        ';
                }
                echo $cadena;
            } */
        } else {
            $cadena = array(
                "icon" => "error",
                "titulo" => "Error de carga",
                "mensaje" => "No hay informacion en el input, por favor revisar la informacion cargada"
            );
        }
        //print_r($_FILES['documentos']['name']);

    }

    public function obtenerDocumetos()
    {
        if ($this->input->post()) {
            $id_actividad = $this->input->post('id_actividad');
            $id_actividad_fecha = $this->input->post('id_actividad_fecha');

            $documentosResponse = $this->ProgramaModel->getDocumentos($id_actividad, $id_actividad_fecha);

            $cadena = '';
            if ($documentosResponse) {
                foreach ($documentosResponse as $key => $value) {
                    $nombre = explode(".", $value->nombre_documento);
                    $cadena = $cadena . '   
                            <div class="col-md-4 text-center shadow-sm p-3 mb-5 bg-body rounded">
                                <img src="' . base_url() . 'assets/img/archivo-adjunto.png" alt="">
                                <br>
                                <br>
                                <a href="' . base_url() . 'documentos/' . $value->nombre_documento . '" style="color:#000;" target="_blank">' . $value->nombre_documento . '</a>
                                <br>
                                <button type="button" onclick="eliminarDocumento(' . $value->id_documento . ')" class="btn btn-outline-danger"> <i class="fas fa-trash-alt"></i></button>
                                
                            </div>
                            ';
                }
                echo $cadena;
            } else {
                echo "No hay documentos cargados";
            }
        }
    }

    public function eliminarDocumento()
    {
        $this->load->helper("url");
        if ($this->input->post()) {
            $id_documento = $this->input->post('id_documento');
            $responseDocumento = $this->ProgramaModel->getOneDocumento($id_documento);
            //echo $responseDocumento->nombre_documento;
            if ($responseDocumento) {

                $response = $this->ProgramaModel->deleteDocumento($id_documento);
                if ($response) {
                    //echo 'documentos/'.$responseDocumento->nombre_documento;
                    unlink("documentos/" . $responseDocumento->nombre_documento);
                    //delete_files(base_url("documentos/" . $responseDocumento->nombre_documento));
                    echo $response;
                }
            }
        }
    }

    public function obtenerUnDocumento()
    {
        if ($this->input->post()) {
            $id_documento = $this->input->post('id_documento');
            $response = $this->ProgramaModel->getOneDocumento($id_documento);
            echo json_encode($response);
        }
    }

    public function obtenerDocumentosAdministrador()
    {
        if ($this->input->post()) {
            $id_actividad = $this->input->post('id_actividad');
            //$id_actividad_fecha = $this->input->post('id_actividad_fecha');

            $documentosResponse = $this->ProgramaModel->getDocumentosAdmin($id_actividad);

            $cadena = '';
            if ($documentosResponse) {
                foreach ($documentosResponse as $key => $value) {
                    $nombre = explode(".", $value->nombre_documento);
                    $cadena = $cadena . '   
                            <div class="col-md-4 text-center shadow-sm p-3 mb-5 bg-body rounded">
                                <img src="' . base_url() . 'assets/img/archivo-adjunto.png" alt="">
                                <br>
                                <br>
                                <a href="' . base_url() . 'documentos/' . $value->nombre_documento . '" style="color:#000;" target="_blank">' . $value->nombre_documento . '</a>
                                <br>
                            </div>
                            ';
                }
                echo $cadena;
            } else {
                echo "No hay documentos cargados";
            }
        }
    }
}



/* End of file actividadesController.php */