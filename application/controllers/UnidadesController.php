<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnidadesController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('usuario')) {
        	header('Location: ' . base_url());
        }
    }

    public function index()
    {
        $arrayUnidades = array();
        //$data['unidades'] = $this->UnidadModel->getUnidades();
        $data['municipios'] = $this->MunicipioModel->getAllMunicipio();
        
        foreach ($data['municipios'] as $key => $value){
            $unidades = $this->UnidadModel->getUnidadesPorMunicipio($value->id_municipio);
            if($unidades){
                foreach ($unidades as $key => $val){
                $object = (object)[
                    "id_unidad_responsable" => $val->id_unidad_responsable,
                    "nombre_unidad" => $val->nombre_unidad,
                    "id_municipio" => $val->id_municipio,
                    "NombreMunicipio" => $val->NombreMunicipio
                ];
                array_push($arrayUnidades, $object);
            }
            }
            
        }

        $data['unidades'] = $arrayUnidades;
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('administrador/unidades/index', $data);
        $this->load->view('partials/footer');
    
    }

    public function insertarUnidad()
    {
        if ($this->input->post()) {
            $nombreUnidad = $this->input->post('unidadResponsable');
            $municipio = $this->input->post('municipio');

            $res = $this->UnidadModel->insertUnidad($nombreUnidad, $municipio);
            echo json_encode($res);
        }
    }

    public function actualizarUnidad()
    {
        if ($this->input->post()) {
            $idUnidad = $this->input->post('idUnidad');
            $nombreUnidad = $this->input->post('unidadResponsableUpdate');

            $res = $this->UnidadModel->updateUnidad($idUnidad, $nombreUnidad);
            echo json_encode($res);
        }
    }

    public function eliminarUnidad()
    {
        if ($this->input->post()) {
            $idUnidad = $this->input->post('idUnidad');

            $res = $this->UnidadModel->deleteUnidad($idUnidad);
            echo json_encode($res);
        }
    }

    public function UnidadPorMunicipio()
    {
        if ($this->input->post()) {
            $idMunicipio = $this->input->post('idMunicipio');

            $res = $this->UnidadModel->getUnidadMunicipioRegistro($idMunicipio);
            echo json_encode($res);
        }
    }

    public function buscarUnidad()
    {
        if ($this->input->post()) {
            $idUnidad = $this->input->post('idUnidad');

            $res = $this->UnidadModel->getUnidadUpdate($idUnidad);
            echo json_encode($res);
        }
    }
}

/* End of file UsuarioController.php */
