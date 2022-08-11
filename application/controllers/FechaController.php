<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class FechaController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ActividadModel');
        $this->load->model('FechaModel');
    }

    public function index($id_programa, $id_componente, $id_actividad)
    {
        $data['programa']    = $this->ProgramaModel->getOneProgramaComponente($id_programa);
        $data['componente'] = $this->ComponenteModel->getOneComponenteActividad($id_componente);
        $data['actividad'] = $this->ActividadModel->getOneActividadFecha($id_actividad);
        $data['meses'] = $this->FechaModel->getAllMeses($id_actividad);
        //var_dump($data);
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('administrador/fechas', $data);
        $this->load->view('partials/footer');
    }

    public function crearFecha()
    {
        if($this->input->post()){
            $id_actividad = $this->input->post('id_actividad');
            $campo = $this->input->post('campo');
            $this->FechaModel->createFecha($campo, $id_actividad);
           
        }
    }

    public function obtenerFecha()
    {
        if($this->input->post()){
            $id_actividad_fecha = $this->input->post('id_actividad_fecha');
            $response = $this->FechaModel->getOneFecha($id_actividad_fecha);
            echo json_encode($response);
        }
    }

    public function modificarFecha()
    {
        if($this->input->post()){
            $id_mes = $this->input->post('id_mes');
            $cantidad = $this->input->post('cantidad');
            $response = $this->FechaModel->updateFecha($id_mes, $cantidad);
            echo $response;
        }else{
            echo "no post";
        }
    }

}

/* End of file FechaController.php */
