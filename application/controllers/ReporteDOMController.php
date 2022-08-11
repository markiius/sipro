<?php


defined('BASEPATH') or exit('No direct script access allowed');

class ReporteDOMController extends CI_Controller
{

    public function index($id_usuario, $id_mes, $id_programa)
    {
        $municipio = $this->ProgramaModel->getOneProgramaMunicipio($id_programa);
        $programas = $this->ProgramaModel->getOneProgramaComponente($id_programa);
        $unidades = $this->UsuarioModel->getAreasPrograma($id_programa);
        $usuario = $this->UsuarioModel->getOneUsuario($id_usuario);
        $actividad  = $this->ActividadModel->getActividadesUsuarioPrograma($id_usuario, $id_programa, $id_mes);
        $infoActividad  = $this->ActividadModel->getInfoActividadesFecha($id_usuario, $id_programa, $id_mes);



        $viewdata['mensaje'] = "Reporte generado por GYG Consultores";
        $viewdata['actividad'] = $actividad;
        $viewdata['ifoActividad'] = $infoActividad;
        $viewdata['programas'] = $programas;
        $viewdata['unidades'] = $unidades;
        $viewdata['municipio'] = $municipio;
        $viewdata['usuario'] = $usuario;

        $html = $this->load->view('administrador/pdf_documento/pdf_reporte', $viewdata, TRUE);
        $this->load->library('pdfgenerator');
        // definamos un nombre para el archivo. No es necesario agregar la extension .pdf
        $filename = 'comprobante_pago';
        // generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
        $this->pdfgenerator->generate($html, $filename, true, 'Letter', 'landscape');
    }

    public function reporteForografico($id_usuario, $id_mes, $id_programa)
    {
        $municipio = $this->ProgramaModel->getOneProgramaMunicipio($id_programa);
        $programas = $this->ProgramaModel->getOneProgramaComponente($id_programa);
        $unidades = $this->UsuarioModel->getAreasPrograma($id_programa);
        $usuario = $this->UsuarioModel->getOneUsuario($id_usuario);
        $actividades  = $this->ActividadModel->getActividades();
        $ifoActividad  = $this->ActividadModel->getInfoActividadesFecha($id_usuario, $id_programa, $id_mes);

        $viewdata['programas'] = $programas;
        $viewdata['unidades'] = $unidades;
        $viewdata['municipio'] = $municipio;
        $viewdata['usuario'] = $usuario;
        $viewdata['actividad'] = $actividades;
        $viewdata['ifoActividad'] = $usuario;


        $array_reporte = array();
        $actividad  = $this->ActividadModel->getActividadesUsuarioPrograma($id_usuario, $id_programa, $id_mes);

        foreach ($actividad as $key => $value) {
            //echo $value->id_actividad_fecha;
            $reporte = $this->ProgramaModel->getReporteActividad($value->id_actividad_fecha);
            foreach ($reporte as $key => $val) {
                //echo "respuesta ".$val->personas_atendidas."       fecha ".$val->fecha_actividad." <br>";

                $object = (object) [
                    "id_reporte_fotografico" => $val->id_reporte_fotografico,
                    "personas_atendidas" => $val->personas_atendidas,
                    "fecha_actividad" => $val->fecha_actividad,
                    "direcciones_dependencias" => $val->direcciones_dependencias,
                    "fotografia_1" => $val->fotografia_1,
                    "fotografia_2" => $val->fotografia_2,
                    "id_actividades_fechas" => $val->id_actividades_fechas,
                    "id_actividad" => $val->id_actividad,
                    "localidades_atendidas" => $val->localidades_atendidas,

                ];
                array_push($array_reporte, $object);
            }
        }
        


        $viewdata['reportes'] = $array_reporte;
        $html = $this->load->view('administrador/pdf_documento/pdf_reporte_fotografico', $viewdata, TRUE);
        $this->load->library('pdfgenerator');
        
        $filename = 'Reporte_fotografico';

        $this->pdfgenerator->generate($html, $filename, true, 'Letter', 'landscape');
    }

    public function reporte_analitico_fism($mes, $ejercicio, $financiamiento, $id_municipio)
    {
        $viewdata['municipio'] = $this->MunicipioModel->getMun($id_municipio);
        $viewdata['unidad'] = $this->UnidadModel->getUnidadUpdate($this->session->userdata('unidadResponsable'));
        $viewdata['obras'] = $this->AnaliticoModel->getAllObrasForMonthYear($mes, $ejercicio, $financiamiento);
        $viewdata['responsable'] = $this->UsuarioModel->getResponsableForAnalitico($id_municipio);
        

        $html = $this->load->view('administrador/pdf_documento/pdf_analitico_fism', $viewdata, TRUE);
        $this->load->library('pdfgenerator');
        $filename = 'Reporte_fotografico';
        $this->pdfgenerator->generate($html, $filename, true, 'LEGAL', 'landscape');
    }

    public function reporte_analitico_forta($mes, $ejercicio, $financiamiento, $id_municipio)
    {
        $viewdata['municipio'] = $this->MunicipioModel->getMun($id_municipio);
        $viewdata['unidad'] = $this->UnidadModel->getUnidadUpdate($this->session->userdata('unidadResponsable'));
        $viewdata['obras'] = $this->AnaliticoModel->getAllObrasForMonthYearForta($mes, $ejercicio, $financiamiento);
        $viewdata['responsable'] = $this->UsuarioModel->getResponsableForAnalitico($id_municipio);


        $html = $this->load->view('administrador/pdf_documento/pdf_analitico_fortamun', $viewdata, TRUE);
        $this->load->library('pdfgenerator');
        $filename = 'Reporte_fotografico';
        $this->pdfgenerator->generate($html, $filename, true, 'LEGAL', 'landscape');
    }
}

/* End of file ReporteDOMController.php */
