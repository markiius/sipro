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
                        } else {
                            $porcentajeTotal = ($ejecutado * 100  / 1);
                        }

                        $status = '';
                        if ($porcentajeTotal >= 131) {
                            $status = '<span style="color: red; font-weight: bold;">Exedido</span>';
                        } else if ($porcentajeTotal >= 111 && $porcentajeTotal <= 130) {
                            $status = '<span style="color: yellow; font-weight: bold;">Sobre Estimado</span>';
                        } else if ($porcentajeTotal >= 98 && $porcentajeTotal <= 110) {
                            $status = '<span style="color: green; font-weight: bold;">Bueno</span>';
                        } else if ($porcentajeTotal >= 80 && $porcentajeTotal <= 97) {
                            $status = '<span style="color: orange; font-weight: bold;">Regular</span>';
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
                            <td align="center"><button class="btn btn-info btn-sm"><i class="fas fa-camera"></i></button></td>
                            <td align="center"><button  onclick="obtenerInformacion('.$value->id_actividad.')" class="btn btn-info btn-sm"><i class="far fa-file-pdf"></i></button></td>
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
                        <td><button class="btn btn-info btn-sm"><i class="fas fa-camera"></i></button></td>
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
                        } else if ($porcentajeTotal >= 80 &&$porcentajeTotal <= 94) {
                            $status = '<span style="color: orange; font-weight: bold;">Regular</span>';
                        } else if ($porcentajeTotal <= 79) {
                            $status = '<span style="color: red; font-weight: bold;">Malo</span>';
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
                /*<td align="center"><a href="' . base_url() . 'Reporte/Obtener/' . $value->id_actividad_fecha . '"><i class="fas fa-eye fa-1x"></i></a></td>*/
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

    public function eliminarPrograma(){
        if($this->input->post()){
            $id_programa = $this->input->post('id_programa');
            $response = $this->ProgramaModel->deletePrograma($id_programa);
            echo $response;
        }
    }
}



/* End of file actividadesController.php */