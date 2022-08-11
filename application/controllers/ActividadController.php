<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class ActividadController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ActividadModel');
        $this->load->model('ComponenteModel');
        $this->load->model('UsuarioModel');
    }

    public function index($id_programa, $id_componente)
    {
        $data['programa']    = $this->ProgramaModel->getOneProgramaComponente($id_programa);
        $data['componente'] = $this->ComponenteModel->getOneComponenteActividad($id_componente);
        $data['actividades'] = $this->ActividadModel->getAllActividades($id_componente);
        foreach ($data['componente'] as $key => $value) {
            $idPrograma = $value->id_programa;
        }
        $programa= $this->ProgramaModel->getOneProgramaComponente($idPrograma);
        $data['areas'] = $this->UnidadModel->getUnidadMunicipio($programa->id_municipio);
        //var_dump($data);
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('administrador/actividad', $data);
        $this->load->view('partials/footer');
    }

    public function crearActividad()
    {

        if($this->input->post()){
            $numero_actividad = $this->input->post('numero_actividad');
            $nombre_actividad = $this->input->post('nombre_actividad');
            $unidad_medida    = $this->input->post('unidad_medida');
            $id_usuario       = $this->input->post('id_usuario');
            $id_componente    = $this->input->post('id_componente');
            $id_programa      = $this->input->post('id_programa');
            $reponse          = $this->ActividadModel->CreateActividad($numero_actividad, $nombre_actividad, $unidad_medida, $id_usuario, $id_componente, $id_programa );
            echo $reponse;
        }
    }

    public function obtenerActividad()
    {
        if($this->input->post()){
            $id_actividad = $this->input->post('id_actividad');
            $response = $this->ActividadModel->getOneActividad($id_actividad);
            echo json_encode($response);
        }
    }

    public function modificarActividad()
    {
        if($this->input->post()){
            $id_actividad = $this->input->post('id_actividad');
            $numero_actividad = $this->input->post('numero_actividad');
            $nombre_actividad = $this->input->post('nombre_actividad');
            $unidad_medida = $this->input->post('unidad_medida');
            $id_usuario = $this->input->post('id_usuario');
            $response = $this->ActividadModel->updateActividad($id_actividad, $numero_actividad, $nombre_actividad, $unidad_medida, $id_usuario);

        }
    }

    public function eliminarActividad()
    {
        if($this->input->post()){
            $id_actividad = $this->input->post('id_actividad');
            $response = $this->ActividadModel->deleteActividad($id_actividad);
            echo $response;
        }
    }

}

/* End of file ActividadController.php */

