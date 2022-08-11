<?php


defined('BASEPATH') or exit('No direct script access allowed');

class AnaliticoObrasController extends CI_Controller
{

    public function index()
    {
        $idUsuario = $this->session->userdata('usuario');
        $id_municipio = $this->session->userdata('municipio');

        $data['municipio'] = $this->MunicipioModel->getOneMunicipio($id_municipio);
        $data['unidad'] = $this->UnidadModel->getUnidadUpdate($this->session->userdata('unidadResponsable'));
        //$data['programa']  = $this->ActividadModel->getActividadesPrograma($id);
        $data['usuario'] = $this->UsuarioModel->getUserUpdate($idUsuario);
        $id_municipio = 0;
        foreach ($data['municipio'] as $key => $value) {
            $id_municipio = $value->id_municipio;
        }
        $data['localidades'] = $this->LocalidadModel->getAllForMunicipio($id_municipio);

        $data['rubros'] = $this->RubroModel->getAllRubros();
        $data['tipo_localidad'] = $this->TipoLocalidadModel->getAllTipoLocalidad();
        $data['indicadores'] = $this->IndicadorModel->getAllIndicador();
        $data['criterios'] = $this->CriterioAsignacion->getAllCriteriosAsignacion();

        $data['obras'] = $this->AnaliticoModel->getAllAnaliticoForMunicipioFISM($id_municipio);
        //var_dump($data['obras']);
        $this->load->view('partials/header');
        $this->load->view('partials/navbar');
        $this->load->view('cliente/analitico_obras_fism', $data);
        $this->load->view('partials/footer');
    }


    public function fortamun()
    {
        $idUsuario = $this->session->userdata('usuario');
        $id_municipio = $this->session->userdata('municipio');

        $data['municipio'] = $this->MunicipioModel->getOneMunicipio($id_municipio);
        $data['unidad'] = $this->UnidadModel->getUnidadUpdate($this->session->userdata('unidadResponsable'));
        //$data['programa']  = $this->ActividadModel->getActividadesPrograma($id);
        $data['usuario'] = $this->UsuarioModel->getUserUpdate($idUsuario);
        $id_municipio = 0;
        foreach ($data['municipio'] as $key => $value) {
            $id_municipio = $value->id_municipio;
        }
        $data['localidades'] = $this->LocalidadModel->getAllForMunicipio($id_municipio);

        $data['rubros'] = $this->RubroModel->getAllRubros();
        $data['tipo_localidad'] = $this->TipoLocalidadModel->getAllTipoLocalidad();
        $data['indicadores'] = $this->IndicadorModel->getAllIndicador();
        $data['criterios'] = $this->CriterioAsignacion->getAllCriteriosAsignacion();

        $data['obras'] = $this->AnaliticoModel->getAllAnaliticoForMunicipioFORTAMUN($id_municipio);
        //var_dump($data['obras']);
        $this->load->view('partials/header');
        $this->load->view('partials/navbar');
        $this->load->view('cliente/analitico_obras_fortamun', $data);
        $this->load->view('partials/footer');
    }

    public function ejemplo()
    {
        echo "este es un ejemplo";
    }


    public function guardarAnaliticoFism()
    {

        if ($this->input->post()) {

            $ejercicio_fiscal = $this->input->post('ejercicio_fiscal');
            $nombre_entidad = $this->input->post('nombre_entidad');
            $clave_entidad = $this->input->post('clave_entidad');
            $nombre_municipio = $this->session->userdata('municipio');
            $clave_municipio = $this->input->post('clave_municipio');
            $nombre_localidad = $this->input->post('nombre_localidad');
            $clave_localidad = $this->input->post('clave_localidad');
            $numero_obra = $this->input->post('numero_obra');
            $folio_mids = $this->input->post('folio_mids');
            $ubicacion_obra = $this->input->post('ubicacion_obra');
            $tipo_localidad = $this->input->post('tipo_localidad');
            $rubro_accion = $this->input->post('rubro_accion');
            $poblacion_total = $this->input->post('poblacion_total');
            $poblacion_referencia = $this->input->post('poblacion_referencia');
            $poblacion_objetivo = $this->input->post('poblacion_objetivo');
            $poblacion_atendida = $this->input->post('poblacion_atendida');
            $numero_hombres = $this->input->post('numero_hombres');
            $numero_mujeres = $this->input->post('numero_mujeres');
            $grado_marginacion = $this->input->post('grado_marginacion');
            $criterios_asignacion = $this->input->post('criterios_asignacion');
            $indicadores_vivienda = $this->input->post('indicadores_vivienda');
            $poblacion_carencia = $this->input->post('poblacion_carencia');
            $total_poblacion_carencia = $this->input->post('total_poblacion_carencia');
            $monto_obra = $this->input->post('monto_obra');
            $fuente_financiamiento = $this->input->post('fuente_financiamiento');
            $avance_financiero = $this->input->post('avance_financiero');
            $avance_fisico = $this->input->post('avance_fisico');
            $geo_localizacion = $this->input->post('geo_localizacion');
            $date = date('Y-m-d');
            $mes = date('m');
            $year = date('Y');

            $response = $this->AnaliticoModel->insertAnalitico(
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
            );
            $resp = array("status" => $response);

            if ($response == "success") {
                echo json_encode($resp, JSON_FORCE_OBJECT);
            } else {
                echo json_encode($resp, JSON_FORCE_OBJECT);
            }
        } else {
            echo "no hay post";
        }
    }


    public function guardarAnaliticoForta()
    {
        if ($this->input->post()) {

            $ejercicio_fiscal = $this->input->post('ejercicio_fiscal');
            $nombre_entidad = $this->input->post('nombre_entidad');
            $clave_entidad = $this->input->post('clave_entidad');
            $nombre_municipio = $this->session->userdata('municipio');
            $clave_municipio = $this->input->post('clave_municipio');
            $nombre_localidad = $this->input->post('nombre_localidad');
            $clave_localidad = $this->input->post('clave_localidad');
            $numero_obra = $this->input->post('numero_obra');
            /* $folio_mids = $this->input->post('folio_mids'); */
            $ubicacion_obra = $this->input->post('ubicacion_obra');
            $tipo_localidad = $this->input->post('tipo_localidad');
            $rubro_accion = $this->input->post('rubro_accion');
            $poblacion_total = $this->input->post('poblacion_total');
            $poblacion_referencia = $this->input->post('poblacion_referencia');
            $poblacion_objetivo = $this->input->post('poblacion_objetivo');
            $poblacion_atendida = $this->input->post('poblacion_atendida');
            $numero_hombres = $this->input->post('numero_hombres');
            $numero_mujeres = $this->input->post('numero_mujeres');
            $grado_marginacion = $this->input->post('grado_marginacion');
            /* $criterios_asignacion = $this->input->post('criterios_asignacion');
            $indicadores_vivienda = $this->input->post('indicadores_vivienda');
            $poblacion_carencia = $this->input->post('poblacion_carencia');
            $total_poblacion_carencia = $this->input->post('total_poblacion_carencia'); */
            $monto_obra = $this->input->post('monto_obra');
            $fuente_financiamiento = $this->input->post('fuente_financiamiento');
            $avance_financiero = $this->input->post('avance_financiero');
            $avance_fisico = $this->input->post('avance_fisico');
            $geo_localizacion = $this->input->post('geo_localizacion');
            $date = date('Y-m-d');
            $mes = date('m');
            $year = date('Y');

            $response = $this->AnaliticoModel->insertAnaliticoForta(
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
            );
            $resp = array("status" => $response);

            if ($response == "success") {
                echo json_encode($resp, JSON_FORCE_OBJECT);
            } else {
                echo json_encode($resp, JSON_FORCE_OBJECT);
            }
        } else {
            echo "no hay post";
        }
    }

    public function obtenerAnalitico()
    {
        if ($this->input->post()) {
            $id_analitico = $this->input->post('id_analitico');
            $response = $this->AnaliticoModel->getAnaliticoForId($id_analitico);
            echo json_encode($response);
        } else {
            echo "no hay post";
        }
    }

    public function modificarAnaliticoFism()
    {
        if ($this->input->post()) {

            $id_analitico_fism = $this->input->post('id_analitico_fism');
            $ejercicio_fiscal = $this->input->post('ejercicio_fiscal');
            $nombre_entidad = $this->input->post('nombre_entidad');
            $clave_entidad = $this->input->post('clave_entidad');
            $nombre_municipio = $this->session->userdata('municipio');
            $clave_municipio = $this->input->post('clave_municipio');
            $nombre_localidad = $this->input->post('nombre_localidad');
            $clave_localidad = $this->input->post('clave_localidad');
            $numero_obra = $this->input->post('numero_obra');
            $folio_mids = $this->input->post('folio_mids');
            $ubicacion_obra = $this->input->post('ubicacion_obra');
            $tipo_localidad = $this->input->post('tipo_localidad');
            $rubro_accion = $this->input->post('rubro_accion');
            $poblacion_total = $this->input->post('poblacion_total');
            $poblacion_referencia = $this->input->post('poblacion_referencia');
            $poblacion_objetivo = $this->input->post('poblacion_objetivo');
            $poblacion_atendida = $this->input->post('poblacion_atendida');
            $numero_hombres = $this->input->post('numero_hombres');
            $numero_mujeres = $this->input->post('numero_mujeres');
            $grado_marginacion = $this->input->post('grado_marginacion');
            $criterios_asignacion = $this->input->post('criterios_asignacion');
            $indicadores_vivienda = $this->input->post('indicadores_vivienda');
            $poblacion_carencia = $this->input->post('poblacion_carencia');
            $total_poblacion_carencia = $this->input->post('total_poblacion_carencia');
            $monto_obra = $this->input->post('monto_obra');
            $fuente_financiamiento = $this->input->post('fuente_financiamiento');
            $avance_financiero = $this->input->post('avance_financiero');
            $avance_fisico = $this->input->post('avance_fisico');
            $geo_localizacion = $this->input->post('geo_localizacion');
            $date = date('Y-m-d');



            $response = $this->AnaliticoModel->updateAnaliticoFism(
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
            );

            echo $response;
        } else {
            echo "no hay post";
        }
    }

    public function modificarAnaliticoForta()
    {
        if ($this->input->post()) {

            $id_analitico_fism = $this->input->post('id_analitico_fism');
            $ejercicio_fiscal = $this->input->post('ejercicio_fiscal');
            $nombre_entidad = $this->input->post('nombre_entidad');
            $clave_entidad = $this->input->post('clave_entidad');
            $nombre_municipio = $this->session->userdata('municipio');
            $clave_municipio = $this->input->post('clave_municipio');
            $nombre_localidad = $this->input->post('nombre_localidad');
            $clave_localidad = $this->input->post('clave_localidad');
            $numero_obra = $this->input->post('numero_obra');
            /* $folio_mids = $this->input->post('folio_mids'); */
            $ubicacion_obra = $this->input->post('ubicacion_obra');
            $tipo_localidad = $this->input->post('tipo_localidad');
            $rubro_accion = $this->input->post('rubro_accion');
            $poblacion_total = $this->input->post('poblacion_total');
            $poblacion_referencia = $this->input->post('poblacion_referencia');
            $poblacion_objetivo = $this->input->post('poblacion_objetivo');
            $poblacion_atendida = $this->input->post('poblacion_atendida');
            $numero_hombres = $this->input->post('numero_hombres');
            $numero_mujeres = $this->input->post('numero_mujeres');
            $grado_marginacion = $this->input->post('grado_marginacion');
            /* $criterios_asignacion = $this->input->post('criterios_asignacion');
            $indicadores_vivienda = $this->input->post('indicadores_vivienda');
            $poblacion_carencia = $this->input->post('poblacion_carencia'); */
            /* $total_poblacion_carencia = $this->input->post('total_poblacion_carencia'); */
            $monto_obra = $this->input->post('monto_obra');
            $fuente_financiamiento = $this->input->post('fuente_financiamiento');
            $avance_financiero = $this->input->post('avance_financiero');
            $avance_fisico = $this->input->post('avance_fisico');
            $geo_localizacion = $this->input->post('geo_localizacion');
            $date = date('Y-m-d');



            $response = $this->AnaliticoModel->updateAnaliticoFism(
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
            );

            echo $response;
        } else {
            echo "no hay post";
        }
    }

    public function eliminarAnalitico()
    {
        if ($this->input->post()) {
            $id_analitico = $this->input->post('id');
            $response = $this->AnaliticoModel->deteleteOneAnalitico($id_analitico);
            echo $response;
        }
    }


    public function obtenerFISMAnaliticos($id_municipio)
    {

        $data['obras'] = $this->AnaliticoModel->getAllAnaliticoForMunicipioFISM($id_municipio);
        $data['municipio'] = $id_municipio;
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('administrador/analitico_fism', $data);
        $this->load->view('partials/footer');
    }


    public function obtenerFORTAAnaliticos($id_municipio)
    {

        $data['obras'] = $this->AnaliticoModel->getAllAnaliticoForMunicipioFORTAMUN($id_municipio);
        $data['municipio'] = $id_municipio;
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('administrador/analitico_forta', $data);
        $this->load->view('partials/footer');
    }

    public function filtroObras()
    {
        if ($this->input->post()) {

            $mes = $this->input->post('mes');
            $ejercicio = $this->input->post('ejercicio');
            $tipo = $this->input->post('tipo');
            $id_municipio = $this->input->post('municipio');

            if ($tipo == "FORTAMUN") {
                $obras = $this->AnaliticoModel->getAllObrasForMonthYearForta($mes, $ejercicio, $tipo, $id_municipio);
                $cadena = '';
                $x = 1;

                if (empty($obras)) {
                    echo false;
                } else {

                    foreach ($obras as $key => $value) {
                        $cadena = $cadena . '
                    <tr>                                    
                    <td>' . $x . '</td>
                    <td>' . $value->ejercicio_fiscal . '</td>
                    <td>' . $value->nombre_entidad . '</td>
                    <td>' . $value->clave_entidad . '</td>
                    <td>' . $value->NombreMunicipio . '</td>
                    <td>' . $value->clave_municipio . '</td>
                    <td>' . $value->localidad . '</td>
                    <td>' . $value->clave_localidad . '</td>
                    <td>' . $value->numero_obra . '</td>
                    <td>' . $value->ubicacion_obra . '</td>
                    <td>' . $value->tipo_localidad . '</td>
                    <td>' . $value->poblacion_total . '/td>
                    <td>' . $value->poblacion_referencia . '</td>
                    <td>' . $value->poblacion_objetivo . '</td>
                    <td>' . $value->poblacion_atendida . '</td>
                    <td>' . $value->hombres . '</td>
                    <td>' . $value->mujeres . '</td>
                    <td>' . $value->grado_marginacion . '</td>
                    <td>' . $value->poblacion_carencia . '</td>
                    <td>' . $value->total_poblacion_carencia . '</td>
                    <td>' . $value->monto_obra . '</td>
                    <td>' . $value->fuente_financiamiento . '</td>
                    <td>' . $value->avance_financiero . '</td>
                    <td>' . $value->avance_fisico . '</td>
                    <td>' . $value->geo_localizacion . '</td>
                    <td>' . $value->fecha_captura . '</td>
                    <td>' . $value->id_archivo_fotorgrafico . '</td>
                </tr>
                ';
                        $x++;
                    }
                    echo $cadena;
                }
            } else if ($tipo == "FISM") {
                $obras = $this->AnaliticoModel->getAllObrasForMonthYear($mes, $ejercicio, $tipo, $id_municipio);
                $cadena = '';
                $x = 1;

                if (empty($obras)) {
                    echo false;
                } else {

                    foreach ($obras as $key => $value) {
                        $cadena = $cadena . '
                    <tr>                                    
                    <td>' . $x . '</td>
                    <td>' . $value->ejercicio_fiscal . '</td>
                    <td>' . $value->nombre_entidad . '</td>
                    <td>' . $value->clave_entidad . '</td>
                    <td>' . $value->NombreMunicipio . '</td>
                    <td>' . $value->clave_municipio . '</td>
                    <td>' . $value->localidad . '</td>
                    <td>' . $value->clave_localidad . '</td>
                    <td>' . $value->numero_obra . '</td>
                    <td>' . $value->folio_mids . '</td>
                    <td>' . $value->ubicacion_obra . '</td>
                    <td>' . $value->tipo_localidad . '</td>
                    <td>' . $value->nombre_rubro . '</td>
                    <td>' . $value->poblacion_total . '/td>
                    <td>' . $value->poblacion_referencia . '</td>
                    <td>' . $value->poblacion_objetivo . '</td>
                    <td>' . $value->poblacion_atendida . '</td>
                    <td>' . $value->hombres . '</td>
                    <td>' . $value->mujeres . '</td>
                    <td>' . $value->grado_marginacion . '</td>
                    <td>' . $value->nombre_criterio . '</td>
                    <td>' . $value->nombre_indicador . '</td>
                    <td>' . $value->poblacion_carencia . '</td>
                    <td>' . $value->total_poblacion_carencia . '</td>
                    <td>' . $value->monto_obra . '</td>
                    <td>' . $value->fuente_financiamiento . '</td>
                    <td>' . $value->avance_financiero . '</td>
                    <td>' . $value->avance_fisico . '</td>
                    <td>' . $value->geo_localizacion . '</td>
                    <td>' . $value->fecha_captura . '</td>
                    <td>' . $value->id_archivo_fotorgrafico . '</td>
                </tr>
                ';
                        $x++;
                    }
                    echo $cadena;
                }
            }
        }
    }
}

/* End of file ReporteObrasController.php */
