<?php


defined('BASEPATH') or exit('No direct script access allowed');

class ComponenteController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProgramaModel');
        $this->load->model('ComponenteModel');
    }

    public function index($id_programa)
    {
        //echo "este es el programa  ".$id_programa;
        $data['programa']    = $this->ProgramaModel->getOneProgramaComponente($id_programa);
        $data['componentes'] = $this->ComponenteModel->getAllComponentes($id_programa);
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('administrador/componente', $data);
        $this->load->view('partials/footer');
    }

    public function crearComponente()
    {
        if ($this->input->post()) {
            $id_programa       = $this->input->post('id_programa');
            $numero_componente = $this->input->post('numero_componente');
            /* $resumen_narrativo = $this->input->post('resumen_narrativo'); */
            $nombre_componente = $this->input->post('nombre_componente');
            $response = $this->ComponenteModel->CreateComponente($numero_componente, $nombre_componente, $id_programa);
            echo $response;
        }
    }

    public function obtenerComponenteTodos()
    {
    }

    public function obtenerComponente()
    {
        if ($this->input->post()) {
            $id_componente = $this->input->post('id_componente');
            $response = $this->ComponenteModel->getOneComponente($id_componente);
            echo json_encode($response);
        }
    }

    public function modificarComponente()
    {
        if ($this->input->post()) {
            $id_componente = $this->input->post('id_componente');
            $numero_componente = $this->input->post('numero_componente');
            $nombre_componente = $this->input->post('nombre_componente');
            $reponse = $this->ComponenteModel->updateComponente($id_componente, $numero_componente, $nombre_componente);
        }
    }

    public function eliminarComponente()
    {
        if($this->input->post()){
            $id_componente = $this->input->post('id_componente');
            $reponse = $this->ComponenteModel->deleteComponente($id_componente);
            echo $reponse;
        }
    }
}

/* End of file ComponenteController.php */
